<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            $request->username === 'admin' &&
            $request->password === 'admin123'
        ) {
            session([
                'login' => true,
                'username' => 'admin',
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->forget(['login', 'username']);

        return redirect('/login')
            ->with('success', 'Berhasil logout.');
    }
}