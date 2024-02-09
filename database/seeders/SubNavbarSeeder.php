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
            ['name' => 'DISPRESS', 'url' => 'https://dispress.smkn4-tng.sch.id/', 'status' => '1'],
            ['name' => 'PENGADUAN ONLINE', 'url' => 'https://confess.smkn4-tng.sch.id/', 'status' => '1'],
        ]);
    }
}
