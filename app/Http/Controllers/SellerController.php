<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function dashboard()
    {
        $user = Session::get('auth_user');
        $listings = Session::get('listings', []);
        $orders = [
            ['code' => '#SO-101', 'total' => 1200, 'status' => 'Hazırlanıyor'],
            ['code' => '#SO-102', 'total' => 460, 'status' => 'Kargoda'],
            ['code' => '#SO-103', 'total' => 310, 'status' => 'Teslim Edildi'],
        ];
        $earnings = [
            'balance' => 24500,
            'pending' => 3200,
            'last_payout' => '2024-10-10',
        ];

        return view('seller.dashboard', compact('user', 'listings', 'orders', 'earnings'));
    }

    public function orders()
    {
        $orders = [
            ['code' => '#SO-101', 'customer' => 'Zeynep', 'total' => 1200, 'status' => 'Hazırlanıyor'],
            ['code' => '#SO-102', 'customer' => 'Ali', 'total' => 460, 'status' => 'Kargoda'],
            ['code' => '#SO-103', 'customer' => 'Ayşe', 'total' => 310, 'status' => 'Teslim Edildi'],
        ];

        return view('seller.orders', compact('orders'));
    }

    public function earnings()
    {
        $transfers = [
            ['date' => '2024-10-10', 'amount' => 1200, 'status' => 'Tamamlandı'],
            ['date' => '2024-10-03', 'amount' => 800, 'status' => 'Tamamlandı'],
            ['date' => '2024-09-27', 'amount' => 1500, 'status' => 'Beklemede'],
        ];

        return view('seller.earnings', compact('transfers'));
    }

    public function verification()
    {
        $kyc = [
            'status' => 'Belgeler Bekleniyor',
            'requirements' => ['Kimlik ön/arka', 'Selfie doğrulama', 'Adres kanıtı'],
        ];

        return view('seller.verification', compact('kyc'));
    }

    public function storeSettings()
    {
        $store = [
            'name' => 'Örnek Mağaza',
            'slug' => 'ornek-magaza',
            'support_email' => 'destek@ornek.com',
            'address' => 'İstanbul, Türkiye',
        ];

        return view('seller.store-settings', compact('store'));
    }
}
