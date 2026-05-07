import os
import json
import numpy as np
import pandas as pd
import pydotplus

from sklearn.tree import DecisionTreeClassifier, export_graphviz, export_text, _tree
from sklearn.model_selection import train_test_split
from sklearn.metrics import confusion_matrix
from IPython.display import display, HTML

# ===== Set display untuk data pangkas =====
pd.set_option('display.max_columns', None)
pd.set_option('display.width', 1000)

# ==============================================
# Path File
# ==============================================
json_file_path = r'C:\xampp\htdocs\skripsi\app\python_scripts\teknik_informatika\data.json'
test_size_file_path = r'C:\xampp\htdocs\skripsi\app\python_scripts\teknik_informatika\test_size.json'

output_image_path = r'C:\xampp\htdocs\skripsi\public\images\teknik_informatika\tree.png'
output_image_relative = 'images/teknik_informatika/tree.png'  # untuk asset() Laravel

output = {
    'tree_text': '',
    'image_path': '',
    'accuracy': 0.0,
    'precision': 0.0,
    'recall': 0.0,
    'f1_score': 0.0,
    'test_size': None,
    'confusion_matrix': [],
    'rules_lulus': [],
    'rules_belum_lulus': [],
    'train_df': [],
    'entropy_gain': []
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
    output['error'] = "File tidak ditemukan."
else:
    try:
        # ===== Baca data =====
        with open(json_file_path, 'r', encoding='utf-8') as file:
            data = json.load(file)

        with open(test_size_file_path, 'r', encoding='utf-8') as file:
            test_size = float(json.load(file)['test_size'])

        test_size = test_size / 100

        # ===== DataFrame =====
        df = pd.DataFrame(data)

        # ===== Split data =====
        train_df, test_df = train_test_split(df, test_size=test_size, random_state=42)
        output['train_df'] = train_df.to_dict(orient='records')
        output['test_df'] = test_df.to_dict(orient='records')

        # ===== Fungsi entropy (FIX) =====
        def entropy(total, belum_lulus, lulus):
            if total == 0:
                return 0
            p_belum_lulus = belum_lulus / total if belum_lulus != 0 else 0
            p_lulus = lulus / total if lulus != 0 else 0
            ent = 0
            if p_belum_lulus > 0:
                ent -= p_belum_lulus * np.log2(p_belum_lulus)
            if p_lulus > 0:
                ent -= p_lulus * np.log2(p_lulus)
            return ent  # ❌ tidak dibulatkan

        # ===== Fungsi gain (FIX) =====
        def gain(df, col, target):
            total_entropy = entropy(len(df), sum(df[target]=='Belum Lulus'), sum(df[target]=='Lulus'))
            grouped = df.groupby(col)[target].value_counts().unstack(fill_value=0)
            result = []
            for idx, row in grouped.iterrows():
                belum_lulus = row.get('Belum Lulus',0)
                lulus = row.get('Lulus',0)
                total = belum_lulus + lulus
                ent = entropy(total, belum_lulus, lulus)
                result.append({
                    'Index': idx,
                    'Belum Lulus': belum_lulus,
                    'Lulus': lulus,
                    'Total': total,
                    'Entropy': ent
                })
            weighted_entropy = sum([(r['Total']/len(df))*r['Entropy'] for r in result])
            gain_val = total_entropy - weighted_entropy  # ❌ tidak dibulatkan

            df_result = pd.DataFrame(result)
            df_result = df_result.rename(columns={'Index': col})
            df_result['Gain'] = ''
            if not df_result.empty:
                df_result.at[0, 'Gain'] = gain_val
            return df_result, gain_val

        # ===== Fungsi pangkas =====
        def data_pangkas(df, n_head=5, n_tail=5):
            total_rows = len(df)
            if total_rows <= n_head + n_tail:
                return df.to_string(index=False)
            head_df = df.head(n_head)
            tail_df = df.tail(n_tail)
            ellipsis_row = pd.DataFrame([['..']*len(df.columns)], columns=df.columns)
            result_df = pd.concat([head_df, ellipsis_row, tail_df], ignore_index=True)
            return result_df.to_string(index=False)

        # ===== Fungsi proses =====
        def process(df, target, atribut, depth=0, max_depth=5, min_gain=0):
            output_process = {"entropy_gain": []}

            if len(df) == 0 or depth >= max_depth:
                return output_process

            total = len(df)
            belum_lulus = sum(df[target]=='Belum Lulus')
            lulus = sum(df[target]=='Lulus')
            ent = entropy(total, belum_lulus, lulus)

            if ent == 0:
                return output_process

            gains = {}
            df_gains_dict = {}
            for col in atribut:
                df_dist, g = gain(df, col, target)
                gains[col] = g
                df_gains_dict[col] = df_dist

            best_col = max(gains, key=gains.get)
            best_gain = gains[best_col]

            if best_gain < min_gain:
                return output_process

            # ===== HTML (FIX PEMBULATAN DI SINI) =====
            html = "<table border='1'>"
            html += "<tr><th></th><th>Jumlah Mahasiswa</th><th>Belum Lulus</th><th>Lulus</th><th>Entropy</th><th>Gain</th></tr>"
            html += f"<tr><td></td><td>{total}</td><td>{belum_lulus}</td><td>{lulus}</td><td>{ent:.4f}</td><td></td></tr>"

            for col in atribut:
                df_dist = df_gains_dict[col]
                html += f"<tr><td colspan='6'><b>{col}</b></td></tr>"
                for index, row in df_dist.iterrows():
                    html += "<tr>"
                    html += f"<td>{row[col]}</td><td>{row['Total']}</td><td>{row['Belum Lulus']}</td><td>{row['Lulus']}</td><td>{row['Entropy']:.4f}</td>"
                    html += f"<td>{row['Gain']:.4f}</td>" if index == 0 and row['Gain'] != '' else "<td></td>"
                    html += "</tr>"
            html += "</table>"

            distribusi_str = f"=== Distribusi (subset depth={depth}) ===\n{data_pangkas(df)}"
            output_process["entropy_gain"].append({
                "html": html,
                "distribusi": distribusi_str
            })

            for val, subset in df.groupby(best_col):
                sub_output = process(subset, target, atribut, depth+1, max_depth=max_depth, min_gain=min_gain)
                output_process["entropy_gain"].extend(sub_output["entropy_gain"])

            return output_process

        # ===== Target & atribut =====
        target = 'kategori'
        atribut = ['jenis_sekolah', 'kategori_sks', 'kategori_ipk', 'ipsmt_1', 'ipsmt_2', 'ipsmt_3', 'ipsmt_4', 'ipsmt_5', 'ipsmt_6', 'ipsmt_7', 'kategori_pkl', 'kategori_kkn', 'kategori_seminar', 'judisium']

        # ===== Jalankan =====
        entropi_gain = process(train_df, target, atribut)
        output["entropy_gain"] = entropi_gain["entropy_gain"]

        # ===== One-Hot Encoding untuk model tree text =====
        df_encoded = pd.get_dummies(train_df.drop(columns=[target]), drop_first=True)
        X_train = df_encoded
        y_train = train_df[target]
        X_test = pd.get_dummies(test_df.drop(columns=[target]), drop_first=True)
        y_test = test_df[target]

        # Sesuaikan kolom X_test agar sama dengan X_train
        X_test = X_test.reindex(columns=X_train.columns, fill_value=0)

        # ===== Model Decision Tree =====
        model = DecisionTreeClassifier(criterion='entropy')
        model.fit(X_train, y_train)

        # ===== Simpan teks pohon =====
        output['tree_text'] = export_text(
            model, feature_names=list(X_train.columns), decimals=3
        )

        # Gambar Decision Tree
        dot_data = export_graphviz(
            model,
            out_file=None,
            feature_names=X_train.columns,
            class_names=model.classes_.astype(str),
            filled=True,
            rounded=True,
            special_characters=True
        )
        os.makedirs(os.path.dirname(output_image_path), exist_ok=True)
        graph = pydotplus.graph_from_dot_data(dot_data)
        graph.write_png(output_image_path)
        output['image_path'] = output_image_relative

        # Ekstrak aturan
        all_paths = extract_paths_from_tree(model, list(X_train.columns), model.classes_)
        output['rules_lulus'] = [
            rule for rule, label in all_paths
            if str(label).lower() in ['true', '1', 'lulus']
        ]
        output['rules_belum_lulus'] = [
            rule for rule, label in all_paths
            if str(label).lower() in ['false', '0', 'belum lulus']
        ]

        # Evaluasi model
        y_pred = model.predict(X_test)
        cm = confusion_matrix(y_test, y_pred)
        output['confusion_matrix'] = cm.tolist()

        # Hitung metrik
        TP = cm[1, 1] if cm.shape[0] > 1 else 0
        TN = cm[0, 0]
        FP = cm[0, 1] if cm.shape[1] > 1 else 0
        FN = cm[1, 0] if cm.shape[0] > 1 else 0

        output['accuracy'] = (TP + TN) / np.sum(cm) * 100 if np.sum(cm) > 0 else 0
        output['precision'] = TP / (TP + FP) * 100 if (TP + FP) > 0 else 0
        output['recall'] = TP / (TP + FN) * 100 if (TP + FN) > 0 else 0
        output['f1_score'] = (
            2 * output['precision'] * output['recall']
        ) / (output['precision'] + output['recall']) if (output['precision'] + output['recall']) > 0 else 0

    except Exception as e:
        output['error'] = str(e)

# ===== Simpan atau print output JSON =====
print(json.dumps(output, ensure_ascii=False, indent=4))
