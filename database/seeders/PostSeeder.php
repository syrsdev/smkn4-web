<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Prestasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(13)->create();
        Prestasi::factory(14)->create();

        Post::insert([
            [
                'judul' => 'Lorem ipsum dolor sit amet',
                'slug' => 'lorem-ipsum-dolor-sit-amet',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 2',
                'slug' => 'lorem-ipsum-dolor-sit-amet-2',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 2,
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 days')),
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 3',
                'slug' => 'lorem-ipsum-dolor-sit-amet-3',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 2,
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 days')),
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 4',
                'slug' => 'lorem-ipsum-dolor-sit-amet-4',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 days')),
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 5',
                'slug' => 'lorem-ipsum-dolor-sit-amet-5',
                'kategori' => 'agenda',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 2,
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 6',
                'slug' => 'lorem-ipsum-dolor-sit-amet-6',
                'kategori' => 'artikel',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 2,
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 7',
                'slug' => 'lorem-ipsum-dolor-sit-amet-7',
                'kategori' => 'event',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
        ]);

        Prestasi::insert([
            [
                'judul' => 'Machine Learning Se-Asia',
                'slug' => 'machine-learning-se-asia',
                'kategori' => 'internasional',
                'konten' => 'Machine Learning Se-Asia',
                'peserta' => 'Yasser Aziz Alfalah',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
            [
                'judul' => 'Membuat Aplikasi Flutter',
                'slug' => 'membuat-aplikasi-flutter',
                'kategori' => 'nasional',
                'konten' => 'Membuat Aplikasi Flutter',
                'peserta' => 'Surya Nata Ardhana',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
            [
                'judul' => 'Web Design Se-Provinsi Banten',
                'slug' => 'web-design-se-provinsi-banten',
                'kategori' => 'provinsi',
                'konten' => 'Web Design Se-Provinsi Banten',
                'peserta' => 'Arnold Darmawan',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
            [
                'judul' => 'Back-End with Laravel',
                'slug' => 'back-end-with-laravel',
                'kategori' => 'kota',
                'konten' => 'Back-End with Laravel',
                'peserta' => 'Muhamad Citra Hidayat',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
            [
                'judul' => 'Back-End with Express',
                'slug' => 'back-end-with-Express',
                'kategori' => 'provinsi',
                'konten' => 'Back-End with Express',
                'peserta' => 'Muhamad Citra Hidayat',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
            [
                'judul' => 'IoT Expert',
                'slug' => 'iot-expert',
                'kategori' => 'internasional',
                'konten' => 'IoT Expert',
                'peserta' => 'Surya Nata Ardhana',
                'status' => '1',
                'id_penulis' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
