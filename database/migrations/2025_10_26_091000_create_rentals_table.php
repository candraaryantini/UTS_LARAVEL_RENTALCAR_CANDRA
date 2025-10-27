<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel cars dan customers
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            // Kolom tanggal sewa
            $table->date('start_date'); // ✅ sesuai dengan seeder
            $table->date('end_date');   // ✅ sesuai dengan seeder

            // Informasi harga total & status
            $table->decimal('total_price', 12, 2);
            $table->string('status')->default('ongoing'); // ongoing | completed | cancelled

            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
