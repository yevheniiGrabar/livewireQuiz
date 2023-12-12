<?php

namespace Database\Factories;

use App\Models\Surveys;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'survey_id' => Surveys::query()->inRandomOrder()->first()->id,
            'text' => $this->faker->sentence,
            'type_question' => $this->faker->randomElement(['input','select','radio'])
        ];
    }
}
