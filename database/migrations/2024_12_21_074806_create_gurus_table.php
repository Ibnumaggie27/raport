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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nip')->unique(); // Nomor Induk Pegawai
            $table->string('nama'); // Nama Guru
            $table->string('email')->nullable(); // Email Guru
            $table->string('alamat')->nullable(); // Alamat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
