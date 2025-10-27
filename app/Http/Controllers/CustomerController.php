<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // 🔹 Menampilkan semua pelanggan (dengan pagination dan pencarian)
    public function index(Request $request)
    {
        $query = Customer::query();

        // Fitur pencarian opsional
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        $customers = $query->orderBy('id', 'desc')->paginate(10);

        return view('customers.index', compact('customers'));
    }

    // 🔹 Menampilkan form tambah pelanggan
    public function create()
    {
        return view('customers.create');
    }

    // 🔹 Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')
                         ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // 🔹 Menampilkan detail pelanggan
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // 🔹 Menampilkan form edit pelanggan
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // 🔹 Update data pelanggan
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')
                         ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // 🔹 Hapus pelanggan
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
                         ->with('success', 'Pelanggan berhasil dihapus.');
    }
}

