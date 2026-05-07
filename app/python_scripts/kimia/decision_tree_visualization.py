import os
import json
import numpy as np
import pandas as pd
import pydotplus
import re
from sklearn.tree import DecisionTreeClassifier, export_graphviz, export_text, _tree
from sklearn.model_selection import train_test_split
from colorama import Fore, Style, init
from ansi2html import Ansi2HTMLConverter

# ==============================================
# Path File
# ==============================================
json_file_path = r'C:\xampp\htdocs\skripsi\app\python_scripts\kimia\data.json'
test_size_file_path = r'C:\xampp\htdocs\skripsi\app\python_scripts\kimia\test_size.json'
output_image_path = r'C:\xampp\htdocs\skripsi\public\images\kimia\tree.png'
output_image_relative = 'images/kimia/tree.png'  # untuk asset() Laravel
prediksi_file_path = r'C:\xampp\htdocs\skripsi\app\python_scripts\kimia\prediksi_status.json'

# ==============================================
# Template Output
# ==============================================
output = {
    'tree_text': '',
    'image_path': '',
    'test_size': None,
    'rules_lulus': [],
    'rules_belum_lulus': []
}

# ==============================================
# Fungsi Ekstraksi Rule dari Decision Tree
# ==============================================
def extract_paths_from_tree(decision_tree, feature_names, target_names):
    tree_ = decision_tree.tree_
    feature_name = [
        feature_names[i] if i != _tree.TREE_UNDEFINED else "undefined!"
        for i in tree_.feature
    ]
    paths = []

    def recurse(node, path):
        if tree_.feature[node] != _tree.TREE_UNDEFINED:
            name = feature_name[node]
            threshold = tree_.threshold[node]
            recurse(tree_.children_left[node], path + [f"{name} <= {threshold:.3f}"])
            recurse(tree_.children_right[node], path + [f"{name} > {threshold:.3f}"])
        else:
            value = tree_.value[node][0]
            class_index = value.argmax()
            class_label = target_names[class_index]
            paths.append((path, class_label))

    recurse(0, [])
    return paths

# ==============================================
# Proses Utama
# ==============================================
if not os.path.exists(json_file_path):
    output['tree_text'] = "File tidak ditemukan."
else:
    try:
        # Baca data
        with open(json_file_path, 'r', encoding='utf-8') as file:
            data = json.load(file)
        with open(test_size_file_path, 'r', encoding='utf-8') as file:
            test_size_data = json.load(file)
            test_size = test_size_data['test_size']
            nim_target = test_size_data.get('nim_target')
            output['test_size'] = test_size
            test_size = test_size / 100  # ubah persen ke proporsi

        # DataFrame dan One-Hot Encoding
        df = pd.DataFrame(data)
        nims = df['nim'].copy()  # Simpan nim untuk mapping hasil prediksi nanti
        df_encoded = pd.get_dummies(df.drop(columns=['nim']), drop_first=True)

        X = df_encoded.iloc[:, :-1]
        y = df_encoded.iloc[:, -1]

        # Train-Test Split
        X_train, X_test, y_train, y_test = train_test_split(
            X, y, test_size=test_size, random_state=42
        )

        # Model Decision Tree
        model = DecisionTreeClassifier(criterion='entropy')
        model.fit(X_train, y_train)

        # Simpan teks pohon
        tree_rules = export_text(model, feature_names=list(X.columns), decimals=3)

        # Prediksi untuk seluruh baris
        prediksi = model.predict(X)
        df['status_prediksi'] = [
            "Lulus" if str(val).lower() in ["1", "true", "lulus"] else "Belum Lulus"
            for val in prediksi
        ]

        # Simpan hasil prediksi ke JSON agar Laravel bisa baca
        df[['nim', 'status_prediksi']].to_json(prediksi_file_path, orient='records', force_ascii=False)

        # Gambar Decision Tree
        dot_data = export_graphviz(
            model,
            out_file=None,
            feature_names=X.columns,
            class_names=model.classes_.astype(str),
            filled=True,
            rounded=True,
            special_characters=True
        )

        nim_index = df[df['nim'] == nim_target].index[0]
        nim_sample = X.iloc[nim_index]
        node_indicator = model.decision_path(nim_sample.values.reshape(1, -1))
        node_index = node_indicator.indices[node_indicator.indptr[0]:node_indicator.indptr[1]]

        # Dapatkan indeks fitur yang relevan dari node_index
        relevant_feature_indices = set()
        for node_id in node_index:
            feat_idx = model.tree_.feature[node_id]
            if feat_idx != _tree.TREE_UNDEFINED and feat_idx < len(X.columns):
                relevant_feature_indices.add(feat_idx)


        graph = pydotplus.graph_from_dot_data(dot_data)
        for node in graph.get_node_list():
            if node.get_name() in [str(i) for i in node_index]:
                node.set_fillcolor("#00FF00")

        os.makedirs(os.path.dirname(output_image_path), exist_ok=True)
        graph.write_png(output_image_path)
        output['image_path'] = output_image_relative

    
        # === 2) Cari index mahasiswa sesuai NIM di DataFrame ===
        row_index = df[df['nim'] == nim_target].index[0]
        sample = X.iloc[[row_index]]

        # === 3) Ambil jalur dari decision tree ===
        node_indicator = model.decision_path(sample)
        highlighted_rules = []
        feature_names = list(X.columns)

        for node_id in node_indicator.indices:
            if model.tree_.feature[node_id] != _tree.TREE_UNDEFINED:
                feat_idx = model.tree_.feature[node_id]
                feature = feature_names[feat_idx]   # aman sekarang
                threshold = model.tree_.threshold[node_id]

                if sample.values[0, feat_idx] <= threshold:
                    condition = f"{feature} <= {threshold:.3f}"
                else:
                    condition = f"{feature} > {threshold:.3f}"

                highlighted_rules.append(condition)

       # === 4) Simpan jalur target sebagai list ===
        target_rule_list = highlighted_rules

        # === 5) Prediksi hasil akhir ===
        prediksi_target = int(model.predict(sample)[0])
        
         # fungsi normalize_line
        def normalize_line(s):
            return re.sub(r'\s+', ' ', s.strip())

        # === Highlight tree_text untuk jalur NIM target ===
        def highlight_tree_text_strict_span(tree_text, target_rule_str):
            if not target_rule_str:
                return tree_text

            # Split dan normalisasi target_conditions
            target_conditions = [normalize_line(cond) for cond in target_rule_str.split(" AND ")]
            i = 0
            highlighted_lines = []

            for line in tree_text.splitlines():
                stripped_norm = normalize_line(line)

                # Highlight hanya jika urutannya sesuai dengan target_conditions
                if i < len(target_conditions) and target_conditions[i] in stripped_norm:
                    # ganti class='text-success' dengan style langsung
                    highlighted_lines.append(f"<span style='color: green'>{line}</span>")
                    i += 1
                else:
                    highlighted_lines.append(line)

            return "\n".join(highlighted_lines)

        # === Gunakan untuk tree_rules ===
        target_rule_str = " AND ".join(highlighted_rules)
        output['tree_text'] = highlight_tree_text_strict_span(tree_rules, target_rule_str)


        # === 6) Ambil semua jalur pohon ===
        all_paths = extract_paths_from_tree(model, feature_names, ['0', '1'])

        rules_lulus_list = []
        rules_belum_list = []
        
        for path, label in all_paths:
            rule_str = " AND ".join(path)
            if str(label) in ['1']:
                rules_lulus_list.append(rule_str)
            else:
                rules_belum_list.append(rule_str)

        # === 7) Highlight hanya 1 rule sesuai target ===
        def apply_highlight_once(rules_list, target_rule_list):
            if not target_rule_list:
                return rules_list[:]
            target_rule_set = set(target_rule_list)
            new = []
            for r in rules_list:
                path_conditions = set(r.split(" AND "))
                if path_conditions == target_rule_set:
                    html_rule = '<span style="color: green">' + r + '</span>'
                    new.append(html_rule)
                else:
                    new.append(r)
            return new

        if prediksi_target == 1:
            output['rules_lulus'] = apply_highlight_once(rules_lulus_list, target_rule_list)
            output['rules_belum_lulus'] = rules_belum_list[:]
        elif prediksi_target == 0:
            output['rules_lulus'] = rules_lulus_list[:]
            output['rules_belum_lulus'] = apply_highlight_once(rules_belum_list, target_rule_list)
        else:
            output['rules_lulus'] = rules_lulus_list[:]
            output['rules_belum_lulus'] = rules_belum_list[:]


        
    except Exception as e:
        output['tree_text'] = "Gunakan nilai antara 0 dan 100."

# ==============================================
# Output JSON
# ==============================================
print(json.dumps(output, ensure_ascii=False, indent=4))