<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Surveys;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SurveyQuestion>
 */
class SurveyQuestionFactory extends Factory
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
            'question_id' => Question::query()->inRandomOrder()->first()->id,
        ];
    }
}
