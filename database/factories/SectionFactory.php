<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sectionname' => $this->faker->unique()->numerify('Section #'),
            'description' => $this->faker->realText($maxNbChars = 100),
            'year'=>'2023',
            'semester' => $this->faker->biasedNumberBetween($min = 1,  $max = 2),
        ];
    }
}
