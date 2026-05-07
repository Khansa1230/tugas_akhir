<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class ForgotController extends Controller
{
    // 1️⃣ HALAMAN INPUT EMAIL (forgot)
    public function index()
    {
        return view('auth.forgot'); // view: forgot.blade.php
    }

    // 2️⃣ VALIDASI EMAIL & TAMPILKAN LINK RESET (link_reset)
    public function store(Request $request)
    {
        $request->validate([
            'email_uin' => 'required|string|exists:users,email_uin',
        ]);

        $user = User::where('email_uin', $request->email_uin)->first();

        // Generate signed link (30 menit) → arah ke confirm_password
        $resetLink = URL::temporarySignedRoute(
            'forgot.confirm_password',
            now()->addMinutes(30),
            ['email' => $user->email_uin]
        );

        return view('auth.link_reset', compact('resetLink')); // view: link_reset.blade.php
    }

    // 3️⃣ HALAMAN KONFIRMASI PASSWORD (confirm_password)
    public function confirm_password(Request $request)
    {
        // GET → tampilkan form confirm_password
        if ($request->isMethod('get')) {
            return view('auth.confirm_password', [ // view: confirm_password.blade.php
                'email_uin' => $request->query('email')
            ]);
        }

        // POST → proses update password
        $request->validate([
            'email_uin' => 'required|exists:users,email_uin',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'confirmed',
            ],
        ], [
            'password.regex' => 'The password must include at least one uppercase letter (A-Z), one lowercase letter (a-z), and one number (0-9).',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $user = User::where('email_uin', $request->email_uin)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke login setelah berhasil reset
        return redirect()->route('login')
            ->with('success', 'Password has been reset successfully.');
    }
}