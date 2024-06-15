@extends('layouts.master')
@section('title', 'Experience')
@section('currentPage', 'Experience ')

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
    <a href="{{ route('experience.create') }}" class="btn btn-primary mb-3">Add Profile</a>
    <table id="example2" class="table table-bordered table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Work</th>
                <th>Division</th>
                <th>Period</th>
              
                <th colspan="4">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($ExperienceData as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->work }}</td>
                    <td>{{ $item->division }}</td>
                    <td>{{ $item->period }}</td>
                  <td>
                        <div class="" style="gap:0.5rem;">

                            <a class="btn btn-warning" href="{{ route('experience.edit', $item->id) }}">Edit</a>
                             {{-- {{ $actives[0]['experience_id'] == $item['id'] ? 'btn-secondary' : 'btn-danger' }} activate-experience-btn --}}
                            <button
                                class="btn btn-danger"
                                data-toggle="modal" data-target="#deleteexperienceModal{{ $item->id }}" >Delete</button>
                        
                            {{-- <button {{ $actives[0]['experience_id'] == $item['id'] ? 'disabled' : '' }}
                                class="btn  {{ $actives[0]['experience_id'] == $item['id'] ? 'btn-secondary' : 'btn-primary' }} activate-experience-btn"
                                data-toggle="modal" data-target="#activateexperienceModal" data-id="{{ $item['id'] }}">
                                {{ $actives[0]['experience_id'] == $item['id'] ? 'Activated' : 'Active' }}</button> --}}
                    </td>
                        <div class="modal fade" id="deleteexperienceModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="deleteexperienceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteexperienceModalLabel">Confirmation to delete
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete this experience?</p>
                                            <p id="delete-test-id-modal"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('experience.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Yes, I'm sure</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="modal fade" id="activateexperienceModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="activateexperienceModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="activateexperienceModalLabel">Confirmation to activate</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to activate this experience?</p>
                                    <p id="activate-test-id-modal"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form method="POST" id="activate-experience-form">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </tr>
                {{-- <div class="card me-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mb-2">experience {{ $item['id'] }}</h5>
                    <p class="card-text">{{ $item['description_1'] }}</p>
                    <a class="btn btn-warning" href="{{ route('experience.edit', $item['id']) }}">Edit</a>
                    <button  class="btn btn-danger delete-experience-btn" data-toggle="modal" data-target="#deleteexperienceModal" data-id="{{ $item['id'] }}">Delete</button>
                </div>
            </div> --}}
        @endforeach
        </tbody>
    </table>




@endsection
