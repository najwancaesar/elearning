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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id('submission_id');
            $table->foreignId('assisgnment_id')->constrained()->onDelete('cascade');
            $table->foreignId('id_user')->constrained()->onDelete('cascade');
            $table->varchar('file_url');
            $table->timestamp('submitted_at');
            $table->float('garde');
            $table->text('feddback');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
