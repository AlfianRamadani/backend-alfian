@extends('layouts.master')
@section('title', 'Contact Form')
@section('currentPage', 'Contact Form')

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
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($FormData as $form)
                                    <tr>
                                        <td>{{ $form->id }}</td>
                                        <td>{{ $form->name }}</td>
                                        <td>{{ $form->email }}</td>
                                        <td>{{ $form->description }}</td>
                                        <td>
                                         
                                            <button type="button" class="btn btn-danger "
                                                data-toggle="modal" data-target="#deletesocial_mediaModal{{ $form->id }}">Delete</button>
                                            <div class="modal fade" id="deletesocial_mediaModal{{ $form->id }}" tabindex="-1"
                                                aria-labelledby="deletesocial_mediaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deletesocial_mediaModalLabel">
                                                                Confirmation to delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete this social_media?</p>
                                                            <p id="delete-test-id-modal"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route("form.destroy", $form->id) }}" id="delete-social_media-form" method="POST">
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
                        {{ $FormData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
