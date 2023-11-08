@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="row row-cols-2">
            <div class="col">
                <h3>Title: {{ $project->title }}</h3>
                <h3>Description:</h3>
                <p class="text-break">{{ $project->description }}</p>

            </div>
            <div class="col">
                <img src="{{ asset('storage/' . $project->image) }}" alt="">
                <h6>{{ $project->publication_date }}</h6><span>{{ $project->project_type }}</span>
            </div>
        </div>
    </div>
@endsection
