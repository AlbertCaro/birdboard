<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    public function index(): View
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function store(ProjectsRequest $request): RedirectResponse
    {
        auth()->user()->projects()->create($request->all());

        return redirect('/projects');
    }

    public function show(Project $project): View
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }
}
