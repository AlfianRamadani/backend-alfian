@extends('layouts.master')
@section('title', 'Education')
@section('currentPage', 'Education')

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
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('education.create') }}" class="btn btn-primary">Add New education</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>School</th>
                                    <th>Major</th>
                                    <th>Period</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($EducationData as $edu)
                                    <tr>
                                        <td>{{ $edu->id }}</td>
                                        <td>{{ $edu->school }}</td>
                                        <td>{{ $edu->major }}</td>
                                        <td>{{ $edu->period }}</td>

                                        <td>
                                            <a href="{{ route('education.edit', $edu->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger "
                                                data-toggle="modal" data-target="#deleteEducationModal{{ $edu->id }}">Delete</button>
                                            <div class="modal fade" id="deleteEducationModal{{ $edu->id }}" tabindex="-1"
                                                aria-labelledby="deleteEducationModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteEducationModalLabel">
                                                                Confirmation to delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete this Education?</p>
                                                            <p id="delete-test-id-modal"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route("education.destroy", $edu->id) }}" id="delete-education-form" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Yes, I'm
                                                                    sure</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $education->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
