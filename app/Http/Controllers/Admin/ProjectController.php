<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['author'] = Auth::user()->name;
        $newProject = Project::create($data);
        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request->all());
        $data = $request->validated(); //richiedo tutti i dati
        $project->update($data); // modifico i dati del singolo Projecte attraverso il mio form con i value già presenti
        return redirect()->route('admin.projects.show', $project)->with('message', $project->name . " Has Been Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "N:" . $project->id . " " . $project->name . " Has Been Deleted");
    }

    public function deletedIndex()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function restore(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('admin.projects.deleted-index')->with('message', $project->name . " Has Been Restored");
    }

    public function permanentDelete(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return redirect()->route('admin.projects.deleted-index')->with('message', $project->name . " Has Been Permanently Removed");
    }
}
