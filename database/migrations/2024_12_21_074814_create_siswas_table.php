<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nis')->unique(); // Nomor Induk Siswa
            $table->string('nama'); // Nama Siswa
            $table->string('email')->nullable(); // Email Siswa
            $table->string('kelas')->nullable(); // Kelas Siswa
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
