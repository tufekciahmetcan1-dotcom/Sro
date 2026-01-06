<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function users()
    {
        $requests = [
            ['name' => 'Zeynep', 'type' => 'Satıcı', 'status' => 'Beklemede'],
            ['name' => 'Ali', 'type' => 'Kullanıcı', 'status' => 'Onaylandı'],
        ];

        return view('admin.users', compact('requests'));
    }

    public function moderation()
    {
        $pendingListings = [
            ['title' => 'Retro Kamera', 'owner' => 'Zeynep', 'status' => 'İncelemede'],
            ['title' => 'Otantik Halı', 'owner' => 'Ali', 'status' => 'Bekliyor'],
        ];

        return view('admin.moderation', compact('pendingListings'));
    }

    public function disputes()
    {
        $disputes = [
            ['code' => '#DS-01', 'buyer' => 'Ayşe', 'status' => 'Açık'],
            ['code' => '#DS-02', 'buyer' => 'Mehmet', 'status' => 'İncelemede'],
        ];

        return view('admin.disputes', compact('disputes'));
    }

    public function commissions()
    {
        $plans = [
            ['category' => 'Elektronik', 'rate' => 8, 'campaign' => 'Kış İndirimi -2%'],
            ['category' => 'Moda', 'rate' => 6, 'campaign' => 'Yeni Satıcı %5 komisyon'],
        ];

        return view('admin.commissions', compact('plans'));
    }

    public function categories()
    {
        $schemas = [
            ['name' => 'Elektronik', 'attributes' => ['Marka', 'Garanti', 'Durum']],
            ['name' => 'Koleksiyon', 'attributes' => ['Sertifika', 'Yıl', 'Baskı']],
        ];

        return view('admin.categories', compact('schemas'));
    }
}
