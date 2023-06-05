<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->integer('kode');
            $table->string('namaobat', 30);
            $table->string('dosis');
            $table->string('efek');
            
            $table->unsignedBigInteger('jenis_obat');
            $table->foreign('jenis_obat')->references('id')->on('jenis')->onDelete('cascade'); //jenis obat itu foreign key, yang dihubungkan dengan id di tabel jenis.
            $table->unsignedBigInteger('kategori');
            $table->foreign('kategori')->references('id')->on('bentuks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};