<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Data Mobil
        $totalCars = Car::count();
        $availableCars = Car::where('is_available', true)->count();
        $soldCars = Car::where('is_available', false)->count();

        // 2. Data Admin (User)
        $totalAdmins = User::count();

        // 3. Pencarian Mobil untuk Quick Search
        $searchResults = null;
        if ($request->filled('search')) {
            $searchResults = Car::where('is_available', true)
                ->where(function ($query) use ($request) {
                    $search = $request->search;
                    $query->where('brand', 'like', "%{$search}%")
                        ->orWhere('model', 'like', "%{$search}%")
                        ->orWhere('year', 'like', "%{$search}%");
                })
                ->get();
        }

        // 4. Aktivitas Terbaru: Mobil Terjual Terbaru
        $latestSoldCars = Car::where('is_available', false)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalCars' => $totalCars,
            'availableCars' => $availableCars,
            'soldCars' => $soldCars,
            'totalAdmins' => $totalAdmins,
            'latestSoldCars' => $latestSoldCars,
            'searchResults' => $searchResults,
            'searchQuery' => $request->search,
        ]);
    }

    public function markAsSold(Request $request, Car $car)
    {
        $car->update(['is_available' => false]);

        return redirect()->back()->with('success', "Mobil {$car->brand} {$car->model} berhasil ditandai sebagai terjual.");
    }
}
