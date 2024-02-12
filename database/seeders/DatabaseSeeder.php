<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
                'slug' => 'super-admin',
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('passwordadmin'),
                'level' => 'admin'
            ], [
                'slug' => 'author',
                'name' => 'Author',
                'email' => 'author@example.com',
                'password' => bcrypt('passwordauthor'),
                'level' => 'author'
            ]
        ]);

        $this->call([
            SekolahSeeder::class,
            // SubNavbarSeeder::class,
            HeroSectionSeeder::class,
            // TenagaPendidikSeeder::class,
            SambutanSeeder::class,
            // PostSeeder::class,
            // JurusanSeeder::class,
            // EkskulSeeder::class,
            SocialMediaSeeder::class,
        ]);
    }
}
