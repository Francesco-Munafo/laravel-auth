<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        if ($request->has('image')) {
            $file_path = Storage::put('placeholders', $val_data['image']);
        }

        $project = new Project();
        $project->title = $val_data['title'];
        $project->slug = Str::slug($project->title, '-');
        $project->description = $val_data['description'];
        $project->image = $file_path;
        $project->publication_date = $val_data['publication_date'];
        $project->project_type = $val_data['project_type'];
        $project->save();

        return to_route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', ['project' => $project]);
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
        $val_data = $request->validated();

        if ($request->has('image')) {
            $newImage = $request->image;
            $file_path = Storage::put('placeholders', $newImage);
            if (!is_null($project->image) && Storage::fileExists($project->image)) {
                Storage::delete($project->image);
            }

            $val_data['image'] = $file_path;
        }

        if (!Str::is($project->getOriginal('title'), $request->title)) {

            $val_data['slug'] = $project->generateSlug($request->title);
        }




        $project->update($val_data);

        return to_route('admin.projects.show', $project);
    }

    public function softDelete(Project $project)
    {
    }

    public function trashed()
    {
        $trashed = Project::onlyTrashed()->paginate(5);
        return view('admin.projects.deleted', compact('trashed'));
    }

    public function restoreTrashed($slug)
    {

        $project = Project::withTrashed()->where('slug', '=', $slug)->first();

        $project->restore();

        return to_route('admin.trash')->with('message', 'Project restored successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $project = Project::withTrashed()->where('slug', '=', $slug)->first();

        $project->delete();
        return to_route('admin.projects.index');
    }
}
