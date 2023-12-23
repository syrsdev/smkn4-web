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
            ['key' => 'logo_sekolah', 'value' => '/images/logo_sekolah.png'],
            ['key' => 'favicon', 'value' => '/images/favicon.png'],
            ['key' => 'alamat_sekolah', 'value' => 'Jl. Veteran No. 1A Babakan, Tangerang, Kota Tangerang - Banten'],
            ['key' => 'sematkan_peta', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5769326362083!2d106.63517767461776!3d-6.187328060621096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f929162547c7%3A0xbbf35137362e584d!2sSMK%20Negeri%204%20Kota%20Tangerang!5e0!3m2!1sid!2sid!4v1700232373573!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],
            ['key' => 'tentang_sekolah', 'value' => '<h1 style="line-height: 2;"><span style="font-size: 18pt; color: rgb(15, 58, 151);"><strong><span style="font-family: "times new roman", times, serif;">SEJARAH SEKOLAH</span></strong></span></h1><p><span style="font-family: "times new roman", times, serif; font-size: 12pt;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p>&nbsp;</p><h2 style="line-height: 2;"><span style="font-size: 18pt;"><strong>PROFIL SEKOLAH</strong></span></h2><table class="table-auto" style="border-collapse: collapse; width: 100%; border: 2px solid rgb(0, 0, 0); height: 224px;" border="1"><colgroup><col style="width: 23.1548%;"><col style="width: 76.7909%;"></colgroup><tbody><tr style="background-color: rgb(186, 55, 42); height: 22.4px;"><td style="border-width: 2px; border-color: rgb(0, 0, 0); padding-top: 16px; padding-right: 16px; padding-bottom: 16px; height: 22.4px; text-align: center;"><span style="color: rgb(255, 255, 255);">Nama Sekolah</span></td><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: left; padding: 16px; height: 22.4px;"><span style="color: rgb(255, 255, 255);">SMKN 4 TANGERANG</span></td></tr><tr style="height: 22.4px;"><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: center; padding-top: 16px; padding-right: 16px; padding-bottom: 16px; height: 22.4px;">NSS / NPSN</td><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: left; padding: 16px; height: 22.4px;">321 026 401 001 / 20606898</td></tr><tr style="background-color: rgb(186, 55, 42); height: 44.8px;"><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: center; padding: 16px; height: 44.8px;"><span style="color: rgb(255, 255, 255);">SK PENDIRIAN</span></td><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: left; padding: 16px; height: 44.8px;"><span style="color: rgb(255, 255, 255);">Nomor : 0206/0/1980</span><br><span style="color: rgb(255, 255, 255);">Tanggal : 30 Juli 1980</span></td></tr><tr style="height: 134.4px;"><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: center; padding: 16px 16px 16px 40px; height: 134.4px;">ALAMAT SEKOLAH</td><td style="border-width: 2px; border-color: rgb(0, 0, 0); text-align: left; padding: 16px 16px 16px 40px; height: 134.4px;">Jl. Veteran No. 1 A Babakan, Tangerang Kota Tangerang - Banten<br>Telp. : 021-5523429<br>Email : smkn4kotatng@yahoo.co.id</td></tr></tbody></table>'],
            ['key' => 'fax_sekolah', 'value' => '-'],
            ['key' => 'telepon_sekolah', 'value' => '021-5523429'],
            ['key' => 'email_sekolah', 'value' => 'smkn4kotatng@yahoo.co.id'],
            ['key' => 'key', 'value' => 'value'], // todo Lanjutin dibawah pake format ini
        ]);
    }
}
