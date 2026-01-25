<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Gallery;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CarListController extends Controller
{
    /**
     * Menampilkan landing page (5 mobil untuk mobile, 3 untuk web).
     */
    public function index(): View
    {
        // Ambil 5 mobil terbaru yang tersedia (akan dibatasi di view)
        $cars = Car::where('is_available', true)
            ->latest()
            ->take(5)
            ->get();
        $galleries = Gallery::latest()->get();

        return view('user.cars.index', compact('cars', 'galleries'));
    }

    /**
     * Menampilkan halaman katalog dengan Search & Filter.
     */
    public function catalog(Request $request): View
    {
        $query = Car::where('is_available', true);

        // 1. Search (Brand atau Model)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%");
            });
        }

        // 2. Filter Brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // 3. Filter Warna
        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        // 4. Filter Harga (Min & Max)
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // 5. Filter Tahun
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // Eksekusi query dengan pagination
        $cars = $query->latest()->paginate(9)->withQueryString();

        // Data untuk opsi filter (agar dropdown dinamis)
        $brands = Car::where('is_available', true)->distinct()->pluck('brand');
        $colors = Car::where('is_available', true)->distinct()->pluck('color');
        $years = Car::where('is_available', true)->distinct()->orderBy('year', 'desc')->pluck('year');

        return view('user.cars.catalog', compact('cars', 'brands', 'colors', 'years'));
    }

    public function show(Car $car): View
    {
        if (!$car->is_available) {
            abort(404, 'Mobil tidak tersedia');
        }
        return view('user.cars.show', compact('car'));
    }
}
