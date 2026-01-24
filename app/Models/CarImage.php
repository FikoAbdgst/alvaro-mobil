<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    // Pastikan 'image_path' ada di sini
    protected $fillable = ['car_id', 'image_path'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
