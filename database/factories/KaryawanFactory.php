<?php

namespace Database\Factories;

use App\Models\Divisi;
use App\Models\Pekerjaan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telepon' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'aktif' => fake()->boolean(),
            'divisi_id' => Divisi::factory(),
            'pekerjaan_id' => Pekerjaan::factory(),
        ];
    }
}
