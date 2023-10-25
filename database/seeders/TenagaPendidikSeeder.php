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
                'nama' => 'Hj. Endah Resmiati, S.Pd. M.Si.',
                'bagian' => 'pegawai',
                'sub_bagian' => 'guru',
                'id_mapel' => null,
            ],
            [
                'nama' => 'Anas Chaerudin Maulana, S.Kom',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 1,
            ],
            [
                'nama' => 'Rina Nurmaladewi, S.Pd.',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 3,
            ],
            [
                'nama' => 'Latifah, S.Pd.',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 2,
            ],
            [
                'nama' => 'Komariah, S.Kom.',
                'bagian' => 'pendidik',
                'sub_bagian' => 'guru',
                'id_mapel' => 1,
            ],
        ]);
    }
}
