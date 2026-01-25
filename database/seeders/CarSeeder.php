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
        // 1. Pastikan folder storage ada
        if (!Storage::disk('public')->exists('cars')) {
            Storage::disk('public')->makeDirectory('cars');
        }

        // 2. Opsional: Salin gambar dummy dari public ke storage agar seeder punya gambar
        // Pastikan Anda punya file public/images/hero.jpeg sesuai file list Anda
        $dummyImage = 'cars/seed-example.jpeg';
        $sourcePath = public_path('images/hero.jpeg');

        if (File::exists($sourcePath)) {
            // Salin file jika ada
            Storage::disk('public')->put($dummyImage, File::get($sourcePath));
        } else {
            // Jika tidak ada gambar sumber, set null atau biarkan string path (nanti akan broken image tapi tidak error seeder)
            // Di sini saya set null agar lebih aman
            $dummyImage = null;
        }

        // 3. Data 5 Mobil
        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Avanza',
                'year' => 2021,
                'color' => 'Hitam',
                'price' => 235000000,
                'description' => 'Kondisi mulus, pajak hidup, siap luar kota.',
                'image' => $dummyImage,
                'is_available' => true,
            ],
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'year' => 2022,
                'color' => 'Putih',
                'price' => 180000000,
                'description' => 'Cocok untuk dalam kota, irit BBM, kilometer rendah.',
                'image' => $dummyImage,
                'is_available' => true,
            ],
            [
                'brand' => 'Mitsubishi',
                'model' => 'Xpander',
                'year' => 2023,
                'color' => 'Silver',
                'price' => 260000000,
                'description' => 'Suspensi nyaman, kabin luas, cocok untuk keluarga.',
                'image' => $dummyImage,
                'is_available' => true,
            ],
            [
                'brand' => 'Suzuki',
                'model' => 'Ertiga',
                'year' => 2020,
                'color' => 'Abu-abu',
                'price' => 210000000,
                'description' => 'Mesin bandel, servis rutin di bengkel resmi.',
                'image' => $dummyImage,
                'is_available' => false, // Contoh status sedang tidak tersedia/tersewa
            ],
            [
                'brand' => 'Daihatsu',
                'model' => 'Rocky',
                'year' => 2022,
                'color' => 'Merah',
                'price' => 205000000,
                'description' => 'SUV compact yang sporty, fitur lengkap, pajak panjang.',
                'image' => $dummyImage,
                'is_available' => true,
            ],
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}
