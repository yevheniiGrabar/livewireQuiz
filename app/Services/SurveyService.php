<?php

namespace App\Services;

use App\Http\Requests\StudentSurveyRequest;
use App\Http\Requests\TeacherSurveyRequest;
use App\Models\Submission;
use App\Models\Type;
use App\Models\UnitOfAnalysis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyService
{
    public function storeTeacherSurvey()
    {
        $teacherData = \request()->validate(
            [
                'degree' => 'required|string',
                'lessons' => 'required|array',
                'lessons.*' => 'in:Math,Literature,Philosophy',
            ]
        );

        $teacherAnalysis = UnitOfAnalysis::query()->create(
            [
                'user_id' => auth()->id(),
                'type_id' => $this->getTypeId('teacher'),
                'title' => $teacherData['degree'],
            ]
        );

        Submission::query()->create(
            [
                'unit_of_analyses_id' => $teacherAnalysis->id,
                'answers' => json_encode($teacherData),
            ]
        );

        return true;
    }

    public function storeStudentSurvey()
    {
        $studentData = \request()->validate(
            [
                'year' => 'required|string',
                'score' => 'required|string|in:60-74,75-89,90-100',
            ]
        );

        $studentAnalysis = UnitOfAnalysis::query()->create(
            [
                'user_id' => auth()->id(),
                'type_id' => $this->getTypeId('student'),
                'title' => $studentData['year'],
            ]
        );

        Submission::query()->create(
            [
                'unit_of_analyses_id' => $studentAnalysis->id,
                'answers' => json_encode($studentData),
            ]
        );

        return true;
    }

    private function getTypeId($typeName)
    {
        return Type::query()->where('name', $typeName)->value('id');
    }
}
