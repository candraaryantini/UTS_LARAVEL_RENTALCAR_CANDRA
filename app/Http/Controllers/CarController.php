<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // 🔹 Menampilkan semua mobil (index)
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Jika ada pencarian, filter data berdasarkan brand, model, atau plat
        $cars = Car::when($search, function ($query, $search) {
                return $query->where('brand', 'like', "%{$search}%")
                             ->orWhere('model', 'like', "%{$search}%")
                             ->orWhere('license_plate', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10) // ✅ gunakan paginate agar bisa pakai $cars->links()
            ->withQueryString(); // agar query pencarian tetap ada di pagination

        return view('cars.index', compact('cars'));
    }

    // 🔹 Menampilkan form tambah mobil
    public function create()
    {
        return view('cars.create');
    }

    // 🔹 Menyimpan data mobil baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer',
            'color' => 'nullable|string|max:50',
            'license_plate' => 'required|string|max:50|unique:cars',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|string|in:available,rented,maintenance',
        ]);

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    // 🔹 Menampilkan detail satu mobil
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    // 🔹 Menampilkan form edit mobil
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // 🔹 Update data mobil
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer',
            'color' => 'nullable|string|max:50',
            'license_plate' => 'required|string|max:50|unique:cars,license_plate,' . $car->id,
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|string|in:available,rented,maintenance',
        ]);

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil diperbarui!');
    }

    // 🔹 Hapus mobil
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
}
