<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with sections.
     */
    public function index()
    {
        $sections = Section::with('content')
            ->where('is_active', true)
            ->orderBy('position')
            ->get();

        return view('home', compact('sections'));
    }
}
