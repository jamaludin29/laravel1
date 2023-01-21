<?php

namespace Database\Factories;

use App\Models\departemen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departemen>
 */
class DepartemenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = departemen::class;
    public function definition()
    {
        return [
            'id_dept' => $this->faker->numerify('dept-####'),
            'nama_dept' => $this->faker->name,
            'jenjang' => $this->faker->word,
        ];
    }
}
