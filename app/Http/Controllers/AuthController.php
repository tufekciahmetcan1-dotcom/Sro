<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $users = Session::get('users', []);

        $users[] = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ];

        Session::put('users', $users);
        Session::put('auth_user', [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('seller.dashboard')->with('status', 'Kayıt başarıyla oluşturuldu, satıcı paneline yönlendirildiniz.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $users = Session::get('users', []);

        foreach ($users as $user) {
            if ($user['email'] === $validated['email'] && Hash::check($validated['password'], $user['password'])) {
                Session::put('auth_user', [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ]);

                return redirect()->route('seller.dashboard')->with('status', 'Hoş geldiniz, panelinize giriş yaptınız.');
            }
        }

        return back()->withErrors(['email' => 'E-posta veya şifre hatalı.'])->withInput();
    }

    public function logout()
    {
        Session::forget('auth_user');

        return redirect()->route('welcome')->with('status', 'Oturum kapatıldı.');
    }
}
