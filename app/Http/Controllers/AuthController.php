<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister()
    {
        $this->bootstrapUsers();

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $users = $this->bootstrapUsers();

        foreach ($users as $user) {
            if ($user['email'] === $validated['email']) {
                return back()->withErrors(['email' => 'Bu e-posta ile kayıtlı bir hesap zaten var.'])->withInput();
            }
        }

        $users[] = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'seller',
        ];

        Session::put('users', $users);
        Session::put('auth_user', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => 'seller',
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

        $users = $this->bootstrapUsers();

        foreach ($users as $user) {
            if ($user['email'] === $validated['email'] && Hash::check($validated['password'], $user['password'])) {
                Session::put('auth_user', [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'] ?? 'seller',
                ]);

                if (($user['role'] ?? 'seller') === 'admin') {
                    return redirect()->route('admin.users')->with('status', 'Hoş geldiniz, yönetim paneline giriş yaptınız.');
                }

                return redirect()->route('seller.dashboard')->with('status', 'Hoş geldiniz, kullanıcı panelinize giriş yaptınız.');
            }
        }

        return back()->withErrors(['email' => 'E-posta veya şifre hatalı.'])->withInput();
    }

    public function logout()
    {
        Session::forget('auth_user');

        return redirect()->route('welcome')->with('status', 'Oturum kapatıldı.');
    }

    private function bootstrapUsers(): array
    {
        $users = Session::get('users');

        if (is_array($users) && count($users)) {
            return $users;
        }

        $defaults = [
            [
                'name' => 'Yönetici',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Kullanıcı',
                'email' => 'kullanici@kullanici.com',
                'password' => Hash::make('123123'),
                'role' => 'seller',
            ],
        ];

        Session::put('users', $defaults);

        return $defaults;
    }
}
