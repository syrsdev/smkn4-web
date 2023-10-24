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
                'url' => 'https://www.facebook.com',
                'icon' => 'fab fa-facebook',
                'color' => '#1877F2',
            ], [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com',
                'icon' => 'fab fa-instagram',
                'color' => '#E4405F',
            ], [
                'name' => 'Twitter',
                'url' => 'https://www.twitter.com',
                'icon' => 'fab fa-twitter',
                'color' => '#1DA1F2',
            ], [
                'name' => 'Youtube',
                'url' => 'https://www.youtube.com',
                'icon' => 'fab fa-youtube',
                'color' => '#FF0000',
            ], [
                'name' => 'LinkedIn',
                'url' => 'https://www.linkedin.com',
                'icon' => 'fab fa-linkedin',
                'color' => '#0077B5',
            ], [
                'name' => 'GitHub',
                'url' => 'https://www.github.com',
                'icon' => 'fab fa-github',
                'color' => '#000000',
            ], [
                'name' => 'WhatsApp',
                'url' => 'https://www.whatsapp.com',
                'icon' => 'fab fa-whatsapp',
                'color' => '#25D366',
            ], [
                'name' => 'Telegram',
                'url' => 'https://www.telegram.com',
                'icon' => 'fab fa-telegram',
                'color' => '#0088CC',
            ]
        ]);
    }
}
