<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mahasiswa;

class mahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mahasiswa::create([
            'id' => 1,
            'nim' => 'feb010101',
            'nama' => 'Febry Antony Santoso',
            'alamat' => 'Jl. Sudirman No 98',
            'jurusan' => 'Ekonomi dan Bisnis',
            'contact' => '087702029102',
            'ipk' => 3.8,
        ]);
    }
}
