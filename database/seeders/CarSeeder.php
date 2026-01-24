<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan folder storage ada
        if (!Storage::disk('public')->exists('cars')) {
            Storage::disk('public')->makeDirectory('cars');
        }

        // Opsional: Salin gambar dummy dari public ke storage agar seeder punya gambar
        // Pastikan Anda punya file public/images/hero.jpeg sesuai file list Anda
        $dummyImage = 'cars/seed-example.jpeg';
        $sourcePath = public_path('images/hero.jpeg');

        if (File::exists($sourcePath)) {
            Storage::disk('public')->put($dummyImage, File::get($sourcePath));
        } else {
            $dummyImage = null;
        }

        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Avanza',
                'year' => 2021,
                'color' => 'Hitam',
                'price' => 235000000,
                'description' => 'Kondisi mulus, pajak hidup.',
                'image' => $dummyImage,
                'is_available' => true,
            ],
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'year' => 2022,
                'color' => 'Putih',
                'price' => 180000000,
                'description' => 'Cocok untuk dalam kota, irit BBM.',
                'image' => $dummyImage,
                'is_available' => true,
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}
