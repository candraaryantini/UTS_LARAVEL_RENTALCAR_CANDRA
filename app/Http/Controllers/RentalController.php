<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * 🔹 Menampilkan semua rental (dengan fitur filter & search)
     */
    public function index(Request $request)
    {
        $customerName = $request->input('customer');
        $carName = $request->input('car');
        $status = $request->input('status');

        $rentals = Rental::with(['car', 'customer'])
            ->when($customerName, function ($query, $customerName) {
                $query->whereHas('customer', function ($q) use ($customerName) {
                    $q->where('name', 'like', "%{$customerName}%");
                });
            })
            ->when($carName, function ($query, $carName) {
                $query->whereHas('car', function ($q) use ($carName) {
                    $q->where('brand', 'like', "%{$carName}%")
                       ->orWhere('model', 'like', "%{$carName}%")
                       ->orWhere('license_plate', 'like', "%{$carName}%");
                });
            })
            ->when($status, function ($query, $status) {
                if ($status !== '') {
                    $query->where('status', $status);
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString(); // agar pagination tetap mempertahankan filter

        return view('rentals.index', compact('rentals'));
    }

    /**
     * 🔹 Menampilkan form tambah rental baru
     */
    public function create()
    {
        $cars = Car::where('status', 'available')->get();
        $customers = Customer::all();
        return view('rentals.create', compact('cars', 'customers'));
    }

    /**
     * 🔹 Menyimpan data rental baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:20',
        ]);

        $rental = Rental::create($validated);

        // Update status mobil menjadi "rented" jika rental aktif
        if ($validated['status'] === 'ongoing') {
            $car = Car::find($validated['car_id']);
            $car->update(['status' => 'rented']);
        }

        return redirect()->route('rentals.index')->with('success', 'Rental berhasil ditambahkan.');
    }

    /**
     * 🔹 Menampilkan detail rental
     */
    public function show(Rental $rental)
    {
        $rental->load(['car', 'customer']);
        return view('rentals.show', compact('rental'));
    }

    /**
     * 🔹 Menampilkan form edit rental
     */
    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::all();
        $customers = Customer::all();
        return view('rentals.edit', compact('rental', 'cars', 'customers'));
    }

    /**
     * 🔹 Mengupdate data rental
     */
    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:20',
        ]);

        $rental->update($validated);

        // Update status mobil
        $car = Car::find($validated['car_id']);
        if ($validated['status'] === 'ongoing') {
            $car->update(['status' => 'rented']);
        } else {
            $car->update(['status' => 'available']);
        }

        return redirect()->route('rentals.index')->with('success', 'Data rental berhasil diperbarui.');
    }

    /**
     * 🔹 Menghapus data rental
     */
    public function destroy(Rental $rental)
    {
        // Saat dihapus, mobil yang terkait otomatis jadi "available" lagi
        $car = $rental->car;
        if ($car) {
            $car->update(['status' => 'available']);
        }

        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Data rental berhasil dihapus.');
    }
}
