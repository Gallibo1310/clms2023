<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apparatus>
 */
class ApparatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->biasedNumberBetween($min = 1,  $max = 10),
            'name' => $this->faker->unique()->numerify('Apparatus #'),
            'qty' => 10,
            'available' => 10,
            'location' => 'Laboratory 1',
            'description' => 'Apparatus from db Seeder',
            'status' => 'Available',
            'dateregistered' => date('Y-m-d'),
            'borrowed' => 0
        ];
    }
}
