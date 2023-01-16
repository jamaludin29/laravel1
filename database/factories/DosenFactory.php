<?php

namespace Database\Factories;

use App\Models\dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = dosen::class;
    public function definition()
    {
        return [
            'nip' => $this->faker->numerify('feb-####'),
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'departemen' => $this->faker->word,
            'contact' => $this->faker->randomDigitNotNull(),

        ];
    }
}
