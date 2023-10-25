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
        Post::insert([
            [
                'judul' => 'Lorem ipsum dolor sit amet',
                'slug' => 'lorem-ipsum-dolor-sit-amet',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 2',
                'slug' => 'lorem-ipsum-dolor-sit-amet-2',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 3',
                'slug' => 'lorem-ipsum-dolor-sit-amet-3',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 4',
                'slug' => 'lorem-ipsum-dolor-sit-amet-4',
                'kategori' => 'berita',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 5',
                'slug' => 'lorem-ipsum-dolor-sit-amet-5',
                'kategori' => 'agenda',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 6',
                'slug' => 'lorem-ipsum-dolor-sit-amet-6',
                'kategori' => 'artikel',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Lorem ipsum dolor sit amet 7',
                'slug' => 'lorem-ipsum-dolor-sit-amet-7',
                'kategori' => 'event',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos quisquam, excepturi eius ab vero porro nostrum debitis rem hic.',
                'status' => '1',
                'id_penulis' => 1,
            ],
        ]);

        Prestasi::insert([
            [
                'judul' => 'Machine Learning Se-Asia',
                'slug' => 'machine-learning-se-asia',
                'kategori' => 'internasional',
                'konten' => 'Machine Learning Se-Asia',
                'pemenang' => 'Yasser Aziz Alfalah',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Membuat Aplikasi Flutter',
                'slug' => 'membuat-aplikasi-flutter',
                'kategori' => 'nasional',
                'konten' => 'Membuat Aplikasi Flutter',
                'pemenang' => 'Surya Nata Ardhana',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Web Design Se-Provinsi Banten',
                'slug' => 'web-design-se-provinsi-banten',
                'kategori' => 'provinsi',
                'konten' => 'Web Design Se-Provinsi Banten',
                'pemenang' => 'Arnold Darmawan',
                'status' => '1',
                'id_penulis' => 1,
            ],
            [
                'judul' => 'Back-End with Laravel',
                'slug' => 'back-end-with-laravel',
                'kategori' => 'kota',
                'konten' => 'Back-End with Laravel',
                'pemenang' => 'Muhamad Citra Hidayat',
                'status' => '1',
                'id_penulis' => 1,
            ],
        ]);
    }
}
