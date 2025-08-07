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
        Schema::create('integrations', function (Blueprint $table) {
            $table->id('id_integration'); // Primary Key
            $table->enum('type', ['akademik', 'keuangan', 'perpustakaan']); // Tipe integrasi
            $table->string('external_url', 255); // URL sistem eksternal
            $table->text('description'); // Keterangan integrasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrations');
    }
};
