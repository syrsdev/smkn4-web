<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::insert([
            [
                'name' => 'Facebook',
                'url' => null,
            ], [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com',
            ], [
                'name' => 'Twitter',
                'url' => null,
            ], [
                'name' => 'YouTube',
                'url' => 'https://www.youtube.com',
            ], [
                'name' => 'WhatsApp',
                'url' => null,
            ],
        ]);
    }
}
