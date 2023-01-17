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
            'jurusan' => $this->faker->word,
            'contact' => $this->faker->randomDigitNotNull(),
            'ipk' => $this->faker->randomFloat(2,3,4),
        ];
    }
}