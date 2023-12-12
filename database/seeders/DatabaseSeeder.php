<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Submission;
use App\Models\SurveyQuestion;
use App\Models\Surveys;
use App\Models\UnitOfAnalysis;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
        ]);

        User::factory(2)->create();
        Surveys::factory(10)->create();
        Question::factory(20)->create();
        QuestionOption::factory(50)->create();
        UnitOfAnalysis::factory(10)->create();
        Submission::factory(30)->create();

    }
}
