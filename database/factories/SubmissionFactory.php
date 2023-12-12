<?php

namespace Database\Factories;

use App\Models\UnitOfAnalysis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_of_analyses_id' => UnitOfAnalysis::query()->inRandomOrder()->first()->id,
            'answers' => json_encode(
                [
                    'degree' => $this->faker->sentence(2),
                    'lessons' => $this->faker->randomElements(
                        ['Math', 'Literature', 'Philosophy'],
                        $this->faker->numberBetween(1, 3)
                    ),
                ]
            ),
        ];
    }
}
