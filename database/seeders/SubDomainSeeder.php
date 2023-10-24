<?php

namespace Database\Seeders;

use App\Models\SubDomain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubDomain::insert([
            ['name' => 'HUBIN', 'url' => 'https://smkn4-tng.sch.id/', 'status' => '1'],
            ['name' => 'PENGADUAN ONLINE', 'url' => 'https://smkn4-tng.sch.id/', 'status' => '1'],
            ['name' => 'PPDB', 'url' => 'https://smkn4-tng.sch.id/', 'status' => '0'],
        ]);
    }
}
