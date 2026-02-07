<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $magangRecords = DB::table('magang')->get();

        $activities = [
            'Analisis kebutuhan sistem dan membuat dokumentasi kegiatan',
            'Implementasi fitur login dan autentikasi pengguna',
            'Desain database untuk backend',
            'Testing dan debugging aplikasi',
            'Mengintegrasikan API dengan frontend',
            'Membuat laporan progress mingguan',
            'Diskusi dengan tim senior tentang clean coding',
            'Optimisasi performa aplikasi',
            'Deployment ke server production',
            'Training pengguna tentang aplikasi baru'
        ];

        foreach ($magangRecords as $magang) {
            $reportCount = rand(3, 5);
            $startDate = Carbon::parse($magang->mulai_magang);

            for ($i = 0; $i < $reportCount; $i++) {
                DB::table('report')->insert([
                    'magang_id' => $magang->id,
                    'tanggal_magang' => $startDate->copy()->addWeeks($i)->format('Y-m-d'),
                    'kegiatan_magang' => $activities[array_rand($activities)],
                    'status' => $magang->status === 'finished' ? 'approved' : ($i === 0 ? 'pending' : 'approved'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
