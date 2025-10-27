<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Rental;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama Dashboard.
     *
     * Menghitung total mobil, pelanggan, dan penyewaan,
     * lalu mengirim datanya ke view dashboard.index.
     */
    public function index()
    {
        // Hitung total data dari masing-masing tabel
        $totalCars = Car::count();
        $totalCustomers = Customer::count();
        $totalRentals = Rental::count();

        // Kirim data ke view resources/views/dashboard/index.blade.php
        return view('dashboard.index', compact('totalCars', 'totalCustomers', 'totalRentals'));
    }
}
