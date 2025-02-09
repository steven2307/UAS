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
        Schema::create('tblnilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mapel');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_mhs');
            $table->integer('suasana_kelas');
            $table->integer('waktu_kehadiran');
            $table->integer('kualitas_pengajaran');
            $table->integer('tugas_penilaian');
            $table->integer('profesionalisme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnilai');
    }
};
