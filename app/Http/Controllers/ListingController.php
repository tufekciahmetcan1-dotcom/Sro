<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Session::get('listings', []);
        $user = Session::get('auth_user');

        return view('seller.listings', compact('listings', 'user'));
    }

    public function create()
    {
        $categories = ['Elektronik', 'Moda', 'Ev & Yaşam', 'Koleksiyon', 'Hizmet'];
        $deliveryOptions = ['Kargo', 'Elden Teslim', 'Dijital Teslimat'];

        return view('listings.create', compact('categories', 'deliveryOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'delivery' => 'required|array',
            'description' => 'required|string|min:20',
            'tags' => 'nullable|string',
            'media' => 'nullable|array',
        ]);

        $listings = Session::get('listings', []);
        $listings[] = [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'delivery' => $validated['delivery'],
            'description' => $validated['description'],
            'tags' => $validated['tags'] ?? '',
            'media' => $validated['media'] ?? [],
            'status' => 'Yayında',
            'created_at' => now()->toDateTimeString(),
        ];

        Session::put('listings', $listings);

        return redirect()->route('seller.listings')->with('status', 'İlan başarıyla oluşturuldu.');
    }
}
