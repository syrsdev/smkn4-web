<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestasi>
 */
class PrestasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $judul = $this->faker->sentence,
            'slug' => Str::slug($judul),
            'kategori' => $this->faker->randomElement(['kota', 'provinsi', 'nasional', 'internasional']),
            'konten' => $this->faker->paragraph,
            'peserta' => $this->faker->name,
            'status' => '1',
            'id_penulis' => User::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
