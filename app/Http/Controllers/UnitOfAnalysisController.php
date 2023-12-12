<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\UnitOfAnalysis;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitOfAnalysisController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $unitsOfAnalysis = UnitOfAnalysis::query()->with(['user', 'type'])->latest()->paginate(4);
        $types = Type::all();

        return view('units', compact('unitsOfAnalysis', 'types'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();
        $users = User::all();

        return view('units_create', compact('types', 'users'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedRequest = $request->validate(
            [
                'user_id' => 'required', Rule::exists('users','id'),
                'type_id' => 'required', Rule::exists('types','id'),
                'title' => 'required','string'
            ]
        );

        UnitOfAnalysis::query()->create($validatedRequest);

        return redirect()->route('units.index')->with('success', 'Analysis unit created successfully');
    }
}
