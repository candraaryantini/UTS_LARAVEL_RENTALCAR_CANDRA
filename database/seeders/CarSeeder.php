<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['brand' => 'Toyota', 'models' => ['Avanza', 'Innova', 'Yaris']],
            ['brand' => 'Honda', 'models' => ['Brio', 'Jazz', 'Civic']],
            ['brand' => 'Mitsubishi', 'models' => ['Xpander', 'Pajero', 'Outlander']],
            ['brand' => 'Suzuki', 'models' => ['Ertiga', 'Ignis', 'Baleno']],
            ['brand' => 'Daihatsu', 'models' => ['Terios', 'Sigra', 'Rocky']],
            ['brand' => 'Hyundai', 'models' => ['Stargazer', 'Creta', 'Santa Fe']],
            ['brand' => 'Kia', 'models' => ['Sonet', 'Seltos', 'Rio']],
            ['brand' => 'Nissan', 'models' => ['Livina', 'Serena', 'March']],
        ];

        $statuses = ['available', 'rented', 'maintenance'];
        $colors = ['Hitam', 'Putih', 'Merah', 'Silver', 'Abu-abu', 'Biru', 'Kuning'];

        for ($i = 1; $i <= 30; $i++) {
            $brandData = $brands[array_rand($brands)];
            $model = $brandData['models'][array_rand($brandData['models'])];

            Car::create([
                'brand' => $brandData['brand'],
                'model' => $model,
                'year' => rand(2018, 2024),
                'color' => $colors[array_rand($colors)],
                // 🔹 plat unik setiap kali
                'license_plate' => 'B ' . rand(1000, 9999) . ' ' . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)),
                'price_per_day' => rand(250000, 750000),
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
