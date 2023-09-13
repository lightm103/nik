<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login.index'); // Sesuaikan dengan nama view yang Anda gunakan untuk halaman login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, arahkan ke halaman beranda admin
            return redirect()->route('pages.dashboard.index'); // Gantilah dengan nama rute dan halaman beranda admin yang sesuai
        }

        // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
        return redirect()->route('login')->withErrors(['loginError' => 'Email atau kata sandi salah.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login'); // Gantilah dengan nama rute untuk halaman login
    }
}
