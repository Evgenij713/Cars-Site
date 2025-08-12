<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Countries extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create(['title' => 'Россия']);
        Country::create(['title' => 'Германия']);
        Country::create(['title' => 'Япония']);
        Country::create(['title' => 'США']);
        Country::create(['title' => 'Италия']);
        Country::create(['title' => 'Южная Корея']);
    }
}
