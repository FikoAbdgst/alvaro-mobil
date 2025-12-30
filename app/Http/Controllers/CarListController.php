<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CarListController extends Controller
{
    /**
     * Menampilkan landing page dengan daftar mobil.
     */
    public function index(): View
    {
        $cars = Car::where('is_available', true)
            ->latest()
            ->paginate(9);

        return view('user.cars.index', compact('cars'));
    }

    /**
     * Menampilkan detail satu mobil.
     */
    public function show(Car $car): View
    {
        // Pastikan hanya mobil yang tersedia yang bisa dilihat detailnya
        if (!$car->is_available) {
            abort(404, 'Mobil tidak tersedia');
        }

        return view('user.cars.show', compact('car'));
    }
}
