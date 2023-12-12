<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyStoreRequest;
use App\Models\Surveys;
use App\Models\Type;
use App\Services\SurveyService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

    public SurveyService $surveyService;

    public function __construct(SurveyService $surveyService)
    {
        $this->surveyService = $surveyService;
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $surveys = Surveys::query()->latest()->paginate(5);

        return view('surveys', compact('surveys'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();
        return view('surveys_create', compact('types'));
    }

    /**
     * @param SurveyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(SurveyStoreRequest  $request): RedirectResponse
    {
        return match ($request->type) {
            'teacher' => $this->handleSurveyOperation($this->surveyService->storeTeacherSurvey()),
            'student' => $this->handleSurveyOperation($this->surveyService->storeStudentSurvey()),
            default => redirect()->route('surveys.index')->with('success', 'Survey created successfully'),
        };
    }


    /**
     * @param Surveys $survey
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Surveys $survey): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Показать форму редактирования опроса
        return view('surveys_edit', compact('survey'));
    }

    /**
     * @param Request $request
     * @param Surveys $survey
     * @return RedirectResponse
     */
    public function update(Request $request, Surveys $survey): RedirectResponse
    {
        //todo
        $survey->update($request->all());

        return redirect()->route('surveys')->with('success', 'Survey updated successfully.');
    }

    /**
     * @param Surveys $survey
     * @return RedirectResponse
     */
    public function destroy(Surveys $survey): RedirectResponse
    {

        $survey->delete();

        return redirect()->route('surveys')->with('success', 'Survey deleted successfully.');
    }

    /**
     * @param $success
     * @return RedirectResponse
     */
    private function handleSurveyOperation($success): RedirectResponse
    {
        return $success
            ? redirect()->route('surveys.index')->with('success', 'Survey created successfully')
            : redirect()->back()->with('error', 'Failed to create survey');
    }
}
