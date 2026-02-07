<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MagangSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        $perusahaans = Perusahaan::all();

        $internships = [
            [
                'judul_magang' => 'Full Stack Web Developer',
                'mulai_magang' => '2026-01-15',
                'selesai_magang' => '2026-04-15',
                'status' => 'ongoing'
            ],
            [
                'judul_magang' => 'Mobile App Developer',
                'mulai_magang' => '2025-11-01',
                'selesai_magang' => '2026-02-01',
                'status' => 'finished'
            ],
            [
                'judul_magang' => 'UI/UX Designer',
                'mulai_magang' => '2026-02-01',
                'selesai_magang' => '2026-05-01',
                'status' => 'approved'
            ],
            [
                'judul_magang' => 'Data Analyst',
                'mulai_magang' => '2026-03-01',
                'selesai_magang' => '2026-06-01',
                'status' => 'pending'
            ]
        ];

        foreach ($mahasiswas as $index => $mahasiswa) {
            if ($index < count($internships)) {
                DB::table('magang')->insert([
                    'user_id' => $mahasiswa->id,
                    'perusahaan_id' => $perusahaans[$index % count($perusahaans)]->id,
                    'judul_magang' => $internships[$index]['judul_magang'],
                    'mulai_magang' => $internships[$index]['mulai_magang'],
                    'selesai_magang' => $internships[$index]['selesai_magang'],
                    'status' => $internships[$index]['status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
