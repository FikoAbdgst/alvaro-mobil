<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'image',
        'image_mime_type', // Tambahkan ini
        'is_available',
    ];

    protected $casts = [
        'year' => 'integer',
        'price' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    /**
     * Accessor untuk mendapatkan image sebagai base64 data URI
     */
    public function getImageDataUriAttribute()
    {
        if ($this->image && $this->image_mime_type) {
            return 'data:' . $this->image_mime_type . ';base64,' . $this->image;
        }
        return null;
    }
}
