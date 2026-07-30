<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
 use Illuminate\Support\Str;


class BrandSeeder extends Seeder
{
   

public function run(): void
{
    Brand::create([
        'name' => 'Zeeco',
        'slug' => Str::slug('zeeco'),
    ]);

    Brand::create([
        'name' => 'Adidas',
        'slug' => Str::slug('adidas'),
    ]);

    Brand::create([
        'name' => 'Puma',
        'slug' => Str::slug('puma'),
    ]);
}
}