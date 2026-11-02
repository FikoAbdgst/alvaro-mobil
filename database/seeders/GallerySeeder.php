<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::firstOrCreate(
            ['image_path' => 'galleries/5XrYnTpb86t7NIPo3k8NKBpbiVAtwDFe2cIt795R.jpg'],
            ['caption' => 'bagus'],
        );
    }
}
