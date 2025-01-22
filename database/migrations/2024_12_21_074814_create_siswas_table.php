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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nis')->unique(); // Nomor Induk Siswa
            $table->string('nama'); // Nama Siswa
            $table->string('email')->nullable(); // Email Siswa
            $table->unsignedBigInteger('kelas_id')->nullable(); // Foreign key ke tabel kelas
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']); // Hapus foreign key
        });
        Schema::dropIfExists('siswas'); // Hapus tabel siswas
    }
};
