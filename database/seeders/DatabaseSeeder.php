<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'name' => $name = 'Super Admin',
                'slug' => Str::slug($name),
                'email' => 'admin@example.com',
                'password' => bcrypt('passwordadmin'),
                'level' => 'admin',
            ], [
                'name' => $name = 'Author',
                'slug' => Str::slug($name),
                'email' => 'author@example.com',
                'password' => bcrypt('passwordauthor'),
                'level' => 'author',
            ], [
                'name' => $name = 'Muhamad Citra Hidayat',
                'slug' => Str::slug($name),
                'email' => 'zytrahidayat11@gmail.com',
                'password' => bcrypt('password'),
                'level' => 'admin',
                // 'level' => 'author',
            ]
        ]);

        $this->call([
            SekolahSeeder::class,
            // SubNavbarSeeder::class,
            HeroSectionSeeder::class,
            // TenagaPendidikSeeder::class,
            SambutanSeeder::class,
            // PostSeeder::class,
            JurusanSeeder::class,
            // EkskulSeeder::class,
            SocialMediaSeeder::class,
        ]);
    }
}
