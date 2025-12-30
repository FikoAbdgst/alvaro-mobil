<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        Car::insert([
            [
                'brand' => 'Toyota',
                'model' => 'Avanza',
                'year' => 2021,
                'color' => 'Hitam',
                'price' => 235000000,
                'description' => 'Toyota Avanza kondisi terawat, mesin halus, siap pakai.',
                'image' => null,
                'image_mime_type' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'year' => 2022,
                'color' => 'Putih',
                'price' => 215000000,
                'description' => 'Honda Brio irit bahan bakar, cocok untuk harian.',
                'image' => null,
                'image_mime_type' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Suzuki',
                'model' => 'Ertiga',
                'year' => 2020,
                'color' => 'Abu-abu',
                'price' => 210000000,
                'description' => 'Suzuki Ertiga nyaman untuk keluarga, interior bersih.',
                'image' => null,
                'image_mime_type' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Mitsubishi',
                'model' => 'Xpander',
                'year' => 2021,
                'color' => 'Silver',
                'price' => 265000000,
                'description' => 'Mitsubishi Xpander suspensi empuk dan kabin luas.',
                'image' => null,
                'image_mime_type' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Daihatsu',
                'model' => 'Terios',
                'year' => 2019,
                'color' => 'Merah',
                'price' => 225000000,
                'description' => 'Daihatsu Terios tangguh, cocok untuk perjalanan jauh.',
                'image' => null,
                'image_mime_type' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
