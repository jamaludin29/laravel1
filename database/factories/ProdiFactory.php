<?php

namespace Database\Factories;

use App\Models\prodi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prodi>
 */
class ProdiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = prodi::class;
    public function definition()
    {
        return [
            'id_prodi' => $this->faker->numerify('feb-####'),
            'nama_prodi' => $this->faker->name,
        ];
    }
}
