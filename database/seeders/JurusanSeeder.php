<?php

namespace Database\Seeders;

use App\Models\BidangKeahlian;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BidangKeahlian::insert([
            ['slug' => 'teknologi-manufaktur-dan-rekayasa', 'nama' => 'Teknologi Manufaktur dan Rekayasa'],
            ['slug' => 'energi-dan-pertambangan', 'nama' => 'Energi dan Pertambangan'],
            ['slug' => 'teknologi-konstruksi-dan-bangunan', 'nama' => 'Teknologi Konstruksi dan Bangunan'],
            ['slug' => 'teknologi-informasi', 'nama' => 'Teknologi Informasi'],
        ]);

        ProgramKeahlian::insert([
            ['slug' => 'teknik-mesin', 'nama' => 'Teknik Mesin', 'id_bidang' => 1],
            ['slug' => 'teknik-elektronika', 'nama' => 'Teknik Elektronika', 'id_bidang' => 1],
            ['slug' => 'teknik-ketenagalistrikan', 'nama' => 'Teknik Ketenagalistrikan', 'id_bidang' => 2],
            ['slug' => 'teknik-geospasial', 'nama' => 'Teknik Geospasial', 'id_bidang' => 2],
            ['slug' => 'teknik-perawatan-gedung', 'nama' => 'Teknik Perawatan Gedung', 'id_bidang' => 3],
            ['slug' => 'teknik-konstruksi-dan-perumahan', 'nama' => 'Teknik Konstruksi dan Perumahan', 'id_bidang' => 3],
            ['slug' => 'desain-pemodelan-dan-informasi-bangunan', 'nama' => 'Desain Pemodelan dan Informasi Bangunan', 'id_bidang' => 3],
            ['slug' => 'pengembangan-perangkat-lunak-dan-gim', 'nama' => 'Pengembangan Perangkat Lunak dan Gim', 'id_bidang' => 4],
        ]);

        KonsentrasiKeahlian::insert([
            [
                'slug' => 'teknik-pemesinan', 
                'nama' => 'Teknik Pemesinan', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 1
            ], [
                'slug' => 'teknik-mekanik-industri', 
                'nama' => 'Teknik Mekanik Industri', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 1
            ], [
                'slug' => 'desain-gambar-mesin', 
                'nama' => 'Desain Gambar Mesin', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 1
            ], [
                'slug' => 'teknik-otomasi-industri', 
                'nama' => 'Teknik Otomasi Industri', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 2
            ], [
                'slug' => 'teknik-instalasi-tenaga-listrik', 
                'nama' => 'Teknik Instalasi Tenaga Listrik', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 3
            ], [
                'slug' => 'teknik-geomatika', 
                'nama' => 'Teknik Geomatika', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 4
            ], [
                'slug' => 'teknik-perawatan-gedung', 
                'nama' => 'Teknik Perawatan Gedung', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 5
            ], [
                'slug' => 'teknik-konstruksi-dan-perumahan', 
                'nama' => 'Teknik Konstruksi dan Perumahan', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 6
            ], [
                'slug' => 'desain-pemodelan-dan-informasi-bangunan', 
                'nama' => 'Desain Pemodelan dan Informasi Bangunan', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 7
            ], [
                'slug' => 'rekayasa-perangkat-lunak', 
                'nama' => 'Rekayasa Perangkat Lunak', 
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et assumenda quibusdam ratione rerum repellendus exercitationem deserunt. Incidunt hic excepturi tempora?', 
                'id_program' => 8
            ],
        ]);
    }
}
