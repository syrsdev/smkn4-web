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
                'status' => 0,
            ], [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com',
                'status' => 1,
            ], [
                'name' => 'Twitter',
                'url' => null,
                'status' => 0,
            ], [
                'name' => 'YouTube',
                'url' => 'https://www.youtube.com',
                'status' => 1,
            ], [
                'name' => 'WhatsApp',
                'url' => null,
                'status' => 0,
            ],
        ]);
    }
}
