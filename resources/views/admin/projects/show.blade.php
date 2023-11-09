@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="row row-cols-2">


            <div class="col-2">
                <img src="{{ asset($project->image) }}" alt="">
            </div>
            <div class="col">
                <h3>Project # {{ $project->id }}</h3>
                <small class="text-secondary">Title:</small>
                <h4>{{ $project->title }}</h4>
                <small class="text-secondary">Description:</small>
                <p class="text-break">{{ $project->description }}</p>
                <small class="text-secondary">Publication date:</small>
                <h6>{{ $project->publication_date }}</h6>
                <small class="text-secondary">Type:</small>
                <h6>{{ $project->project_type }}</h6>

            </div>
        </div>
    </div>
@endsection
