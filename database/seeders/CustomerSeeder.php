<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['name' => 'Budi Santoso', 'phone' => '081234567890', 'email' => 'budi@example.com', 'address' => 'Jakarta'],
            ['name' => 'Siti Aminah', 'phone' => '081234567891', 'email' => 'siti@example.com', 'address' => 'Depok'],
            ['name' => 'Andi Saputra', 'phone' => '081234567892', 'email' => 'andi@example.com', 'address' => 'Bogor'],
            ['name' => 'Dewi Lestari', 'phone' => '081234567893', 'email' => 'dewi@example.com', 'address' => 'Bekasi'],
            ['name' => 'Rudi Hartono', 'phone' => '081234567894', 'email' => 'rudi@example.com', 'address' => 'Tangerang'],
            ['name' => 'Yulia Kartika', 'phone' => '081234567895', 'email' => 'yulia@example.com', 'address' => 'Bandung'],
            ['name' => 'Agus Pratama', 'phone' => '081234567896', 'email' => 'agus@example.com', 'address' => 'Cirebon'],
            ['name' => 'Lina Marlina', 'phone' => '081234567897', 'email' => 'lina@example.com', 'address' => 'Cianjur'],
            ['name' => 'Doni Firmansyah', 'phone' => '081234567898', 'email' => 'doni@example.com', 'address' => 'Sukabumi'],
            ['name' => 'Fajar Hidayat', 'phone' => '081234567899', 'email' => 'fajar@example.com', 'address' => 'Karawang'],
            ['name' => 'Tini Rahayu', 'phone' => '081234567900', 'email' => 'tini@example.com', 'address' => 'Purwakarta'],
            ['name' => 'Rina Agustina', 'phone' => '081234567901', 'email' => 'rina@example.com', 'address' => 'Bandung'],
            ['name' => 'Joko Susilo', 'phone' => '081234567902', 'email' => 'joko@example.com', 'address' => 'Bekasi'],
            ['name' => 'Fitri Handayani', 'phone' => '081234567903', 'email' => 'fitri@example.com', 'address' => 'Jakarta'],
            ['name' => 'Ahmad Fauzi', 'phone' => '081234567904', 'email' => 'ahmad@example.com', 'address' => 'Depok'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
