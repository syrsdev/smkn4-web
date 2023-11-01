<?php

namespace Database\Seeders;

use App\Models\SubNavbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubNavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubNavbar::insert([
            ['name' => 'HUBIN', 'url' => 'https://smkn4-tng.sch.id/', 'status' => '1'],
            ['name' => 'PENGADUAN ONLINE', 'url' => 'https://smkn4-tng.sch.id/', 'status' => '1'],
            ['name' => 'PPDB', 'url' => 'https://smkn4-tng.sch.id/', 'status' => '0'],
        ]);
    }
}
