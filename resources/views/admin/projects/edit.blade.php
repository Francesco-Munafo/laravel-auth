@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <h1>Editing "{{ $project->title }}"</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle"
                    placeholder="Insert a project title" value="{{ old('title', $project->title) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"
                    value="{{ old('description', $project->description) }}"></textarea>
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Select a file</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Select a file"
                    value="{{ $project->image }}">
            </div>

            <div class="mb-3">
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" class="form-control" name="publication_date" id="publication_date"
                    aria-describedby="helpDate" placeholder="Insert the project publication date"
                    value="{{ old('publication_date', $project->publication_date) }}">
            </div>


            <div class="mb-3">
                <label for="project_type" class="form-label">Project Type</label>
                <input type="text" class="form-control" name="project_type" id="project_type"
                    aria-describedby="helpProjectType" placeholder="Insert a project project type"
                    value="{{ old('project_type', $project->project_type) }}">
            </div>


            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection