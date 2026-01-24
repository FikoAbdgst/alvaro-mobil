<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'color',
        'price',
        'description',
        'image', // Ini sekarang menyimpan path, misal: 'cars/abc.jpg'
        'is_available',
    ];

    protected $casts = [
        'year' => 'integer',
        'price' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    // Relasi ke Gallery
    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    // Helper untuk mengambil URL gambar utama
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return asset('images/default-car.png'); // Gambar default jika kosong
    }
}
