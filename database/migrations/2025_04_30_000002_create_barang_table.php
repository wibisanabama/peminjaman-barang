<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->integer('stok')->default(0);
            $table->unsignedBigInteger('id_kat')->nullable();
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia');

            $table->foreign('id_kat')->references('id')->on('kategori')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
