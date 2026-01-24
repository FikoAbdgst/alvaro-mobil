<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->decimal('price', 15, 2);
            $table->text('description')->nullable();

            // UBAH DISINI: Cukup string untuk menyimpan path (misal: cars/foto.jpg)
            $table->string('image')->nullable();
            // HAPUS kolom image_mime_type karena tidak diperlukan lagi untuk storage

            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
