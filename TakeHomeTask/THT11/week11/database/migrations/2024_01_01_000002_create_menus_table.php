<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * TODO: Buat tabel 'menus' dengan kolom-kolom berikut:
     * - id (Primary Key, BigInt, Auto Increment) -> gunakan $table->id()
     * - restoran_id (Foreign Key) -> gunakan $table->foreignId('restoran_id')
     * - nama (String)
     * - harga (Integer)
     * - jumlah (Integer)
     * - timestamps (created_at, updated_at)
     * 
     * Catatan:
     * - Foreign key mengacu ke tabel 'restorans'
     * - Gunakan onDelete('cascade')
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            // TODO: Tulis kode pembuatan kolom di sini
            $table->id();
            $table->foreignId('restoran_id')
                  ->constrained('restorans')
                  ->onDelete('cascade');
            $table->string('nama');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
