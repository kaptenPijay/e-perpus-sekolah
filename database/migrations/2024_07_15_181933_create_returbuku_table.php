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
        Schema::create('returbuku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->unsigned()->references('id')->on('peminjaman')->onDelete('cascade');
            $table->string('status', 20)->nullable();;
            $table->string('deskripsi', 25)->nullable();;
            $table->string('photo')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returbuku');
    }
};
