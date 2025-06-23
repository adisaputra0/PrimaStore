<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

            if(!$user->is_verified){
                Auth::logout(); // Logout langsung kalau belum verifikasi
                return redirect()->back()->with('error', 'Email belum diverifikasi oleh admin.');
            }
            

            Session::flash('message', [
                'icon' => 'info',
                'text' => 'Selamat Datang ' . auth()->user()->name
            ]);
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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_verified' => 1
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

    public function post_seller(Request $request){
        
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'ktm' => 'image|mimes:jpeg,png,jpg',
            'phone' => 'nullable|string|max:15',
        ]);

        // Handle password
        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = "penjual";

        // Handle ktm
        if ($request->hasFile('ktm')) {
            $ktmName = uniqid() . '.' . $request->ktm->extension();
            $request->ktm->move('images/ktm', $ktmName);
            $validated['ktm'] = $ktmName;
        }

        // Simpan ke database
        $user = User::create($validated);

        // Login user sementara
        auth()->login($user);

        // Kirim email verifikasi
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice');
    }
}
