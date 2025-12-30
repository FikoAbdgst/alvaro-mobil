<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource (Index).
     */
    public function index(): View
    {
        $cars = Car::latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource (Create).
     */
    public function create(): View
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage (Store).
     */
    public function store(CarStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Konversi gambar ke base64
            $imageData = base64_encode(file_get_contents($file->getRealPath()));
            $data['image'] = $imageData;
            $data['image_mime_type'] = $file->getMimeType();
        } else {
            $data['image'] = null;
            $data['image_mime_type'] = null;
        }

        Car::create($data);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    /**
     * Display the specified resource (Show).
     */
    public function show(Car $car): View
    {
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource (Edit).
     */
    public function edit(Car $car): View
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage (Update).
     */
    public function update(CarUpdateRequest $request, Car $car): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Konversi gambar baru ke base64
            $imageData = base64_encode(file_get_contents($file->getRealPath()));
            $data['image'] = $imageData;
            $data['image_mime_type'] = $file->getMimeType();
        } else {
            // Jika tidak ada file baru, jangan timpa kolom image
            unset($data['image']);
            unset($data['image_mime_type']);
        }

        $car->update($data);

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage (Destroy).
     */
    public function destroy(Car $car): RedirectResponse
    {
        // Tidak perlu hapus file karena gambar di database
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
}
