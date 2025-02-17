<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KepalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Kepala Sekolah',
            'email' => 'kepalasekolah@gmail.com',
            'role' => 'admin',
            'identitas' => '222222',
            'alamat' => 'jambi',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
            'kepala' => 1
        ]);
    }
}
