<?php

namespace Database\Factories;

use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = mahasiswa::class;
    public function definition()
    {
        return [
            'nim' => $this->faker->numerify('feb-####'),
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'id_prodi' => $this->faker->randomDigitNotNull(),
            // 'foto' => $this->faker->randomDigitNotNull(),
            'jenkel' => $this->faker->word,
            // 'ipk' => $this->faker->randomFloat(2,3,4),
        ];
    }
}