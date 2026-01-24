<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\CarImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        // Query dasar
        $query = Car::query();

        // Fitur Filter (Opsional, tapi disiapkan agar error $years hilang jika ada filter)
        if ($request->filled('search')) {
            $query->where('model', 'like', '%' . $request->search . '%')
                ->orWhere('brand', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $cars = $query->latest()->paginate(10);

        // [FIX ERROR] Ambil data tahun unik untuk dropdown filter di index.blade.php
        $years = Car::distinct()->orderBy('year', 'desc')->pluck('year');

        return view('admin.cars.index', compact('cars', 'years'));
    }

    public function create(): View
    {
        return view('admin.cars.create');
    }

    public function store(CarStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // 1. Simpan Foto Utama (Cover) ke Storage
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $car = Car::create($data);

        // 2. Simpan Foto Gallery (Multiple)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('car_gallery', 'public');
                $car->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function show(Car $car): View
    {
        $car->load('images');
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car): View
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(CarUpdateRequest $request, Car $car): RedirectResponse
    {
        $data = $request->validated();

        // 1. Update Foto Utama
        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $data['image'] = $request->file('image')->store('cars', 'public');
        } else {
            unset($data['image']); // Jangan update jika tidak ada file baru
        }

        $car->update($data);

        // 2. Tambah Foto Gallery Baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('car_gallery', 'public');
                $car->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil diperbarui!');
    }

    public function destroy(Car $car): RedirectResponse
    {
        // Hapus file fisik foto utama
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        // Hapus file fisik foto gallery
        foreach ($car->images as $gallery) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
    public function destroyImage(CarImage $carImage)
    {
        // 1. Hapus file fisik di storage
        if (Storage::disk('public')->exists($carImage->image_path)) {
            Storage::disk('public')->delete($carImage->image_path);
        }

        // 2. Hapus record di database
        $carImage->delete();

        // 3. Kembalikan respon JSON sukses
        return response()->json(['success' => true, 'message' => 'Foto berhasil dihapus']);
    }
}
