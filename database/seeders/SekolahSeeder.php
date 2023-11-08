<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::insert([
            ['key' => 'nama_sekolah', 'value' => 'SMK NEGERI 4 TANGERANG'],
            ['key' => 'logo_sekolah', 'value' => 'smkn4.svg'],
            ['key' => 'favicon', 'value' => 'favicon.png'],
            ['key' => 'alamat_sekolah', 'value' => 'Jl. Veteran No. 1A Babakan, Tangerang, Kota Tangerang - Banten'],
            ['key' => 'link_alamat', 'value' => 'SMKN 4 TANGERANG'],
            ['key' => 'sejarah_sekolah', 'value' => ''],
            ['key' => 'visi_sekolah', 'value' => ''],
            ['key' => 'misi_sekolah', 'value' => ''],
            ['key' => 'tujuan_sekolah', 'value' => ''],
            ['key' => 'telepon_sekolah', 'value' => ''], // * Isi yang ini sekalian
            ['key' => 'email_sekolah', 'value' => ''], // * Isi yang ini sekalian
            ['key' => 'key', 'value' => 'value'], // todo Lanjutin dibawah pake format ini
        ]);
    }
}