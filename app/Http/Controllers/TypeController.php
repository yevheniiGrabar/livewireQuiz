<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class TypeController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index():  View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();

        return view('type', compact('types'));
    }
}
