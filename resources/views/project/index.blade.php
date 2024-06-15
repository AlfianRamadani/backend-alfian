@extends('layouts.master')
@section('title', 'Project')
@section('currentPage', 'Project ')

@section('content')
    @csrf

    @if (session('error_status'))
        <div class="alert alert-danger" role="alert">
            {{ session('error_status') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('project.create') }}" class="btn btn-primary mb-3">Add Project</a>
    <table id="example2" class="table table-responsive table-bordered table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
               
                <th colspan="2">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($ProjectData as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                  
                    <td><img height="200" width="200" src="{{ $item->featured_img }}" alt=""></td>
                    <td>
                        <div class="d-flex flex-column" style="gap:0.5rem;">

                            <a class="btn btn-warning" href="{{ route('project.edit', $item->id) }}">Edit</a>
                            <button
                                class="btn btn-danger"
                                data-toggle="modal" data-target="#deleteProjectModal{{ $item->id }}" >Delete</button>
                            <div class="modal fade" id="deleteProjectModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteProjectModalLabel">Confirmation to delete
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete this Project?</p>
                                            <p id="delete-test-id-modal"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('project.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Yes, I'm sure</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                    </td>
            
                    </div>

                </tr>
                {{-- <div class="card me-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mb-2">Project {{ $item['id'] }}</h5>
                    <p class="card-text">{{ $item['description_1'] }}</p>
                    <a class="btn btn-warning" href="{{ route('Project.edit', $item['id']) }}">Edit</a>
                    <button  class="btn btn-danger delete-Project-btn" data-toggle="modal" data-target="#deleteProjectModal" data-id="{{ $item['id'] }}">Delete</button>
                </div>
            </div> --}}
        @endforeach
        </tbody>
    </table>




@endsection
