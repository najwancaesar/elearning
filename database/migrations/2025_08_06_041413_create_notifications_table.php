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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id_notification');             // Primary Key
            $table->unsignedBigInteger('id_user');     // Foreign Key ke users
            $table->string('title', 150);              // Judul notifikasi
            $table->text('message');                   // Isi notifikasi
            $table->boolean('is_read')->default(false); // Apakah sudah dibaca
            $table->timestamp('sent_at')->useCurrent(); // Waktu pengiriman

            // Foreign Key Constraint
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
