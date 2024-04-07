<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(8);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *  
     */
    public function create()
    {
        $project = new Project;
        $types = Type::all();
        return view('admin.projects.create', compact('project', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $project = new Project;
        $project->fill($data);
        $project->save();
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     */
    public function show(project $project)
    {
        $types = Type::all();
        return view('admin.projects.show', compact('project', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     */
    public function edit(project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     */
    public function update(Request $request, project $project)
    {
        $types = Type::all();
        $data = $request->all();
        $project->update($data);
        return redirect()->route('admin.projects.show', compact('project', 'types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
