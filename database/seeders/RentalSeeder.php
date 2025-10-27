<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Customer;
use Carbon\Carbon;

class RentalSeeder extends Seeder
{
    public function run(): void
    {
        $cars = Car::pluck('id')->toArray();
        $customers = Customer::pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            $start = Carbon::now()->subDays(rand(1, 30));
            $end = (clone $start)->addDays(rand(2, 7));

            Rental::create([
                'car_id' => $cars[array_rand($cars)],
                'customer_id' => $customers[array_rand($customers)],
                'start_date' => $start,
                'end_date' => $end,
                'total_price' => rand(700000, 2500000),
                'status' => collect(['ongoing', 'completed', 'cancelled'])->random(),
            ]);
        }
    }
}
