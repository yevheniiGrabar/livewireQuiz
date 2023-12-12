<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class SubmissionController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $submissions = Submission::query()->with('unit')->latest()->paginate(5);

        return view('submissions', compact('submissions'));
    }
}
