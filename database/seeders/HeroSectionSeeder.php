<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::insert([
            ['key' => 'welcome', 'value' => 'SELAMAT DATANG DI WEBSITE'],
            ['key' => 'deskripsi', 'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo doloremque culpa odio eveniet obcaecati dolorum consectetur ad consequatur praesentium mollitia repudiandae, labore nulla alias ipsa porro modi rerum? Dolor, vero?'],
            ['key' => 'hero_image', 'value' => '/images/hero_image.png'],
            ['key' => 'image_position', 'value' => 'top'],
            ['key' => 'text_color', 'value' => '#ffffff'],
        ]);
    }
}
