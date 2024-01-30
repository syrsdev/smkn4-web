<?php

namespace Database\Seeders;

use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenagaPendidikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::insert([
            [
                'slug' => 'program-keahlian-rekayasa-perangkat-lunak', 
                'nama' => 'Program Keahlian Rekayasa Perangkat Lunak'
            ],
            ['slug' => 'ppkn', 'nama' => 'PPKN'],
            ['slug' => 'matematika', 'nama' => 'Matematika'],
        ]);

        Pendidik::insert([
            [
                'slug' => 'endah-resmiati-s-pd-m-si',
                'nama' => 'Endah Resmiati, S.Pd. M.Si.',
                'bagian' => 'kepsek',
                'sub_bagian' => 'kepsek',
                'id_mapel' => null,
            ],
            [
                'slug' => 'anas-chaerudin-maulana-s-kom',
                'nama' => 'Anas Chaerudin Maulana, S.Kom',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 1,
            ],
            [
                'slug' => 'rina-nurmaladewi-s-pd',
                'nama' => 'Rina Nurmaladewi, S.Pd.',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 3,
            ],
            [
                'slug' => 'latifah-s-pd',
                'nama' => 'Latifah, S.Pd.',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 2,
            ],
            [
                'slug' => 'komariah-s-kom',
                'nama' => 'Komariah, S.Kom.',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 1,
            ],
        ]);
    }
}
