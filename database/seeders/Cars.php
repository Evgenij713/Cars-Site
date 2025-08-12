<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cars extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 1, 'model' => 'Granta', 'price' => 650000, 'transmission' => 1, 'vin' => 'XTA21099012345678']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 1, 'model' => 'Vesta', 'price' => 1250000, 'transmission' => 2, 'vin' => 'XTA21099123456789']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 2, 'model' => 'Patriot', 'price' => 1850000, 'transmission' => 2, 'vin' => 'XTT22333444556677']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 2, 'model' => 'Hunter', 'price' => 1650000, 'transmission' => 1, 'vin' => 'XTT22333445566778']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 3, 'model' => 'Волга', 'price' => 2500000, 'transmission' => 2, 'vin' => 'XTH33445566778899']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 4, 'model' => 'Senat', 'price' => 18000000, 'transmission' => 2, 'vin' => 'XTA99887766554433']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 5, 'model' => '3', 'price' => 2200000, 'transmission' => 2, 'vin' => 'XTA11223344556677']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 6, 'model' => 'E-Class', 'price' => 6500000, 'transmission' => 2, 'vin' => 'WDB12345678901234']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 7, 'model' => 'X5', 'price' => 7500000, 'transmission' => 2, 'vin' => 'WBA56789012345678']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 8, 'model' => 'A6', 'price' => 5800000, 'transmission' => 2, 'vin' => 'WAU78901234567890']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 9, 'model' => 'Tiguan', 'price' => 3200000, 'transmission' => 2, 'vin' => 'WVG12345678901234']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 10, 'model' => 'Cayenne', 'price' => 9500000, 'transmission' => 2, 'vin' => 'WP1ZZZ9YZKD123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 11, 'model' => 'Camry', 'price' => 3500000, 'transmission' => 2, 'vin' => 'JT2BF123456789012']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 12, 'model' => 'CR-V', 'price' => 3800000, 'transmission' => 2, 'vin' => '2HKRW123456789012']);
        Car::create(['user_id' => rand(1, 10), 'brand_id' => 13, 'model' => 'Qashqai', 'price' => 2800000, 'transmission' => 2, 'vin' => 'SJNFAAJ11U1234567']);
        Car::create(['user_id' => rand(1, 10), 'brand_id' => 14, 'model' => 'CX-5', 'price' => 3200000, 'transmission' => 2, 'vin' => 'JM3KE4DY0M0123456']);
        Car::create(['user_id' => rand(1, 10), 'brand_id' => 15, 'model' => 'Forester', 'price' => 3400000, 'transmission' => 2, 'vin' => 'JF2SJAEC0CH123456']);
        Car::create(['user_id' => rand(1, 10), 'brand_id' => 16, 'model' => 'Focus', 'price' => 1800000, 'transmission' => 1, 'vin' => '1FADP3F21EL123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 17, 'model' => 'Tahoe', 'price' => 6500000, 'transmission' => 2, 'vin' => '1GNSKJKJ5MR123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 18, 'model' => 'Model 3', 'price' => 4500000, 'transmission' => 4, 'vin' => '5YJ3E1EA0MF123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 19, 'model' => 'Charger', 'price' => 5500000, 'transmission' => 2, 'vin' => '2C3CDXBG5KH123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 20, 'model' => 'Grand Cherokee', 'price' => 5800000, 'transmission' => 2, 'vin' => '1C4RJFBG5MC123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 21, 'model' => '488 GTB', 'price' => 25000000, 'transmission' => 3, 'vin' => 'ZFF76ALA0H0123456']);
        Car::create(['user_id' => rand(1, 10), 'status' =>0 , 'brand_id' => 22, 'model' => 'Huracan', 'price' => 28000000, 'transmission' => 3, 'vin' => 'ZHWBU1ZF0HLA12345']);
        Car::create(['user_id' => rand(1, 10), 'status' => 0, 'brand_id' => 23, 'model' => 'Ghibli', 'price' => 8500000, 'transmission' => 2, 'vin' => 'ZAM57RSA0G0123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 24, 'model' => 'Giulia', 'price' => 4800000, 'transmission' => 2, 'vin' => 'ZARFAEBN0M7123456']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 25, 'model' => '500', 'price' => 2200000, 'transmission' => 1, 'vin' => 'ZFA31200001234567']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 6, 'model' => 'S-Class', 'price' => 12000000, 'transmission' => 2, 'vin' => 'WDD22222222222222']);
        Car::create(['user_id' => rand(1, 10), 'status' => 5, 'brand_id' => 7, 'model' => '3 Series', 'price' => 4500000, 'transmission' => 2, 'vin' => 'WBA33333333333333']);
        Car::create(['user_id' => rand(1, 10), 'status' => 0, 'brand_id' => 11, 'model' => 'RAV4', 'price' => 3200000, 'transmission' => 2, 'vin' => 'JTMFB3FV0MD123456']);
    }
}
