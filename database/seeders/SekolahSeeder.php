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
            ['key' => 'link_alamat', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5769326362083!2d106.63517767461776!3d-6.187328060621096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f929162547c7%3A0xbbf35137362e584d!2sSMK%20Negeri%204%20Kota%20Tangerang!5e0!3m2!1sid!2sid!4v1700232373573!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],
            ['key' => 'tentang_sekolah', 'value' => ''],
            ['key' => 'fax', 'value' => '-'],
            ['key' => 'telepon_sekolah', 'value' => '021-5523429'], // * Isi yang ini sekalian
            ['key' => 'email_sekolah', 'value' => 'smkn4kotatng@yahoo.co.id'], // * Isi yang ini sekalian
            ['key' => 'key', 'value' => 'value'], // todo Lanjutin dibawah pake format ini
        ]);
    }
}
