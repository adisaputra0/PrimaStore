<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(){
        return view("auth.login");
    }
    public function post_login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user
            Auth::login($user);

            // Cek apakah email sudah diverifikasi
            if (!$user->hasVerifiedEmail()) {
                Auth::logout(); // Logout langsung kalau belum verifikasi
                return redirect()->back()->with('error', 'Email belum diverifikasi.');
            }

            // Redirect ke halaman setelah login
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session & regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Berhasil logout.');
    }
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Login user sementara
        auth()->login($user);

        // Kirim email verifikasi
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice');
    }

    public function register_seller(){
        return view("auth.register_seller");
    }
}
