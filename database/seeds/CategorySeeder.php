<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'order' => 'AA',
            'name' => 'CHAPAS CONFORMADAS',
            'image' => 'images/category/MaskGroup629.png',
        ]);

        Category::create([
            'order' => 'BB',
            'name'  => 'CHAPAS LISAS',
            'image' => 'images/category/MaskGroup630.png',
        ]);

        Category::create([
            'order' => 'CC',
            'name'  => 'PERFILES',
            'image' => 'images/category/MaskGroup631.png',
        ]);
        
        Category::create([
            'order' => 'DD',
            'name'  => 'AISLANTES',
            'image' => 'images/category/MaskGroup632.png',
        ]);

        Category::create([
            'order' => 'EE',
            'name'  => 'TUBOS ESTRUCTURALES',
            'image' => 'images/category/MaskGroup633.png',
        ]);

        Category::create([
            'order' => 'FF',
            'name'  => 'MALLAS',
            'image' => 'images/category/MaskGroup634.png',
        ]);

        Category::create([
            'order' => 'GG',
            'name'  => 'ZINGUERIA',
            'image' => 'images/category/MaskGroup635.png',
        ]);

        Category::create([
            'order' => 'HH',
            'name'  => 'ACCESORIOS',
            'image' => 'images/category/MaskGroup637.png',
        ]);

    }
}
