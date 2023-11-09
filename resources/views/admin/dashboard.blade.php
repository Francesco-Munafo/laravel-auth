@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Welcome {{ Auth::user()->name }}!</h1>
        <div class="row row-cols-3">
            <div class="col">
                <div class="card">
                    <h3>Projects: </h3>
                    <strong>{{ $total_projects }}</strong>
                </div>
            </div>
            <div class="col">
                <div class="card">

                </div>
            </div>
            <div class="col">
                <div class="card">

                </div>
            </div>

        </div>
    </div>
@endsection
