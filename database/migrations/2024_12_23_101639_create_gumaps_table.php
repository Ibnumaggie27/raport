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
        Schema::create('gumaps', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('mapel_id') // Foreign key ke tabel mapels
                  ->constrained('mapels')
                  ->onDelete('cascade'); // Hapus data jika mapel terkait dihapus

            $table->foreignId('guru_id') // Foreign key ke tabel gurus
                  ->constrained('gurus')
                  ->onDelete('cascade'); // Hapus data jika guru terkait dihapus

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gumaps');
    }
};
