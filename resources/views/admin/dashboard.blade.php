@extends('layouts.admin')

@section('content')
    <div class="card my-5">

        <a class="btn btn-primary ms-auto me-3 my-3" href="{{ route('admin.projects.create') }}">Add a new project</a>
        <div class="card-body p-0">

            <div class="table-responsive-sm">
                <table
                    class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                    <thead class="table-light">
                        <caption>Projects</caption>
                        <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>IMAGE</th>
                            <th>DATE</th>
                            <th>PROJECT TYPE</th>
                            <th>ACTIONS</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($projects as $project)
                            <tr class="table-primary">
                                <td scope="row">{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>
                                    @if (asset($project->image))
                                        {{-- <img src="{{ asset('storage/' . $project->image) }}" alt=""> --}}
                                    @else
                                        N/A
                                    @endif

                                </td>
                                <td>{{ $project->publication_date }}</td>

                                <td>{{ $project->project_type }}</td>

                                <td>
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.projects.show', $project->id) }}">More</a>

                                    <a class="btn btn-primary"
                                        href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $project->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-decoration-underline"
                                                        id="modalTitleId-{{ $project->id }}">Deleting your
                                                        project "{{ $project->title }}"
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Warning! This is an irreversible operation! Doing this you'll delete
                                                    your
                                                    project.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Dismiss</button>

                                                    <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Delete</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
