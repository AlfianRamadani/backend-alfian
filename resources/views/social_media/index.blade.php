@extends('layouts.master')
@section('title', 'Social Media')
@section('currentPage', 'Social Media')

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
                        <a href="{{ route('social-media.create') }}" class="btn btn-primary">Add New Social Media</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Platform</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($SocialMediaData as $edu)
                                    <tr>
                                        <td>{{ $edu->id }}</td>
                                        <td>{{ $edu->platform }}</td>
                                        <td>{{ $edu->link }}</td>
                                        <td>
                                            <a href="{{ route('social-media.edit', $edu->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger "
                                                data-toggle="modal" data-target="#deletesocial_mediaModal{{ $edu->id }}">Delete</button>
                                            <div class="modal fade" id="deletesocial_mediaModal{{ $edu->id }}" tabindex="-1"
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
                                                            <form action="{{ route("social-media.destroy", $edu->id) }}" id="delete-social_media-form" method="POST">
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
                        {{-- {{ $social_media->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
