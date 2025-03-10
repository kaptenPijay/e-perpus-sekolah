<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peminjaman;
use Carbon\Carbon;

class UpdateDendaPeminjaman extends Command
{
    protected $signature = 'peminjaman:update-denda';
    protected $description = 'Menambahkan denda peminjaman setiap minggu setelah jatuh tempo';

    public function handle()
    {
        $this->info('Memulai proses pemantauan denda...');

        while (true) { // Loop tanpa henti
            $peminjamans = Peminjaman::where('tgl_peminjaman', '<=', now()->subWeek())->get();

            foreach ($peminjamans as $peminjaman) {
                $weeksLate = Carbon::parse($peminjaman->tgl_peminjaman)->diffInWeeks(now());
                $peminjaman->update(['total_denda' => $weeksLate * 500000]);
            }

            $this->info('Denda diperbarui pada: ' . now());

            sleep(10); // Tunggu 10 detik sebelum menjalankan lagi
        }
    }
}
