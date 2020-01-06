<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    public function index(Project $model): View
    {
        $projects = $model::all();

        return view('projects.index', compact('projects'));
    }

    public function store(Project $model, ProjectsRequest $request): RedirectResponse
    {
        $model::create($request->all());

        return redirect('/projects');
    }

    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }
}
