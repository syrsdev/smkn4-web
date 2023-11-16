<?php

namespace Database\Seeders;

use App\Models\Ekskul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekskul::insert([
            ['slug' => 'basket', 'nama' => 'BASKET'],
            ['slug' => 'multimedia', 'nama' => 'MULTIMEDIA'],
            ['slug' => 'marawis', 'nama' => 'MARAWIS'],
            ['slug' => 'rohis', 'nama' => 'ROHIS'],
            ['slug' => 'karate', 'nama' => 'KARATE'],
            ['slug' => 'sispateta', 'nama' => 'SISPATETA'],
        ]);
    }
}
