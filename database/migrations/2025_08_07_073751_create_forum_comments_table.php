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
        Schema::create('forum_comments', function (Blueprint $table) {
            $table->bigIncrements('id_comment'); // Primary key
            $table->unsignedBigInteger('id_forum'); // Foreign Key ke forums
            $table->unsignedBigInteger('id_user');  // Foreign Key ke users
            $table->text('comment'); // Isi komentar
            $table->timestamp('created_at')->useCurrent(); // Hanya created_at

            // Index
            $table->index('id_forum');
            $table->index('id_user');

            // Foreign key constraints
            $table->foreign('id_forum')
                  ->references('id_forum')->on('forums')
                  ->onDelete('cascade');

            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_comments');
    }
};
