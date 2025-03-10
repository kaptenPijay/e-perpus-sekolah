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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('no_peminjaman', 10);
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->string('status', 20)->nullable();;
            $table->string('deskripsi', 25)->nullable();;
            $table->decimal('total_denda', 10, 2)->default(0.00);
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('buku_id')->unsigned()->references('id')->on('buku')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
