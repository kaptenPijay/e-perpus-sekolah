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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 20);
            $table->string('identitas', 8)->unique()->nullable();
            $table->string('alamat', 35)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('kelas', 6)->nullable();
            $table->string('role', 20);
            $table->string('email', 25)->unique();
            $table->timestamp('email_verified_at', 6)->nullable();
            $table->string('password');
            $table->boolean('kepala', 20)->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
