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
                'icon' => 'fab fa-facebook',
            ], [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com',
                'icon' => 'fab fa-instagram',
            ], [
                'name' => 'Twitter',
                'url' => null,
                'icon' => 'fab fa-twitter',
            ], [
                'name' => 'Youtube',
                'url' => 'https://www.youtube.com',
                'icon' => 'fab fa-youtube',
            ], [
                'name' => 'LinkedIn',
                'url' => null,
                'icon' => 'fab fa-linkedin',
            ], [
                'name' => 'WhatsApp',
                'url' => null,
                'icon' => 'fab fa-whatsapp',
            ], [
                'name' => 'Telegram',
                'url' => null,
                'icon' => 'fab fa-telegram',
            ]
        ]);
    }
}
