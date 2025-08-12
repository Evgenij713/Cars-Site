<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Brands extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create(['title' => 'Lada (ВАЗ)', 'country_id' => 1]);
        Brand::create(['title' => 'УАЗ', 'country_id' => 1]);
        Brand::create(['title' => 'ГАЗ', 'country_id' => 1]);
        Brand::create(['title' => 'Aurus', 'country_id' => 1]);
        Brand::create(['title' => 'Moskvich', 'country_id' => 1]);

        Brand::create(['title' => 'Mercedes-Benz', 'country_id' => 2]);
        Brand::create(['title' => 'BMW', 'country_id' => 2]);
        Brand::create(['title' => 'Audi', 'country_id' => 2]);
        Brand::create(['title' => 'Volkswagen', 'country_id' => 2]);
        Brand::create(['title' => 'Porsche', 'country_id' => 2]);

        Brand::create(['title' => 'Toyota', 'country_id' => 3]);
        Brand::create(['title' => 'Honda', 'country_id' => 3]);
        Brand::create(['title' => 'Nissan', 'country_id' => 3]);
        Brand::create(['title' => 'Mazda', 'country_id' => 3]);
        Brand::create(['title' => 'Subaru', 'country_id' => 3]);

        Brand::create(['title' => 'Ford', 'country_id' => 4]);
        Brand::create(['title' => 'Chevrolet', 'country_id' => 4]);
        Brand::create(['title' => 'Tesla', 'country_id' => 4]);
        Brand::create(['title' => 'Dodge', 'country_id' => 4]);
        Brand::create(['title' => 'Jeep', 'country_id' => 4]);

        Brand::create(['title' => 'Ferrari', 'country_id' => 5]);
        Brand::create(['title' => 'Lamborghini', 'country_id' => 5]);
        Brand::create(['title' => 'Maserati', 'country_id' => 5]);
        Brand::create(['title' => 'Alfa Romeo', 'country_id' => 5]);
        Brand::create(['title' => 'Fiat', 'country_id' => 5]);

        Brand::create(['title' => 'Hyundai', 'country_id' => 6]);
        Brand::create(['title' => 'KIA', 'country_id' => 6]);
        Brand::create(['title' => 'Genesis', 'country_id' => 6]);
        Brand::create(['title' => 'SsangYong', 'country_id' => 6]);
    }
}
