<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'nama_perusahaan' => 'PT. Jaya Jaya',
                'alamat_perusahaan' => 'Jl. Batununggal No. 123, Jakarta',
                'telp' => '0215555001'
            ],
            [
                'nama_perusahaan' => 'CV. Teknologi Keren',
                'alamat_perusahaan' => 'Jl. Singgasana No. 456, Bandung',
                'telp' => '0225555002'
            ],
            [
                'nama_perusahaan' => 'PT. Binus',
                'alamat_perusahaan' => 'Jl. Pasirkaliki 23, Surabaya',
                'telp' => '0315555003'
            ],
            [
                'nama_perusahaan' => 'Startup Bebek',
                'alamat_perusahaan' => 'Jl. Diponegoro No. 321, Yogyakarta',
                'telp' => '02745555004'
            ],
            [
                'nama_perusahaan' => 'PT. Global Tech Indo',
                'alamat_perusahaan' => 'Jl. Pemuda No. 654, Medan',
                'telp' => '0615555005'
            ]
        ];

        foreach ($companies as $company) {
            Perusahaan::create($company);
        }
    }
}
