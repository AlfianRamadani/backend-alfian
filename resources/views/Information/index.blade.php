@extends('layouts.master')
@section('title', 'Information')
@section('currentPage', 'Information ')

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
    <a href="{{ route('information.create') }}" class="btn btn-primary mb-3">Add Profile</a>
    <table id="example2" class="table table-responsive table-bordered table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Email</th>
                <th>Position</th>
                <th>Contact Person</th>
                <th>Experience</th>
                <th>Satisfication</th>
                <th>Avatar</th>
                <th colspan="4">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($informationData as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->country }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->contact_person }}</td>
                    <td>{{ $item->experience }}</td>
                    <td>{{ $item->satisfication }}</td>
                    <td><img height="200" width="200" src="{{ $item->avatar }}" alt=""></td>
                    <td>
                        <div class="d-flex flex-column" style="gap:0.5rem;">

                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#ShowInformationModal{{ $item->id }}">View</button>
                            <div class="modal fade" id="ShowInformationModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="showInformationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="showInformationModalLabel">View Detail
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="NameRead">Name</label>
                                                        <input disabled type="text" value="{{ $item->name }}"
                                                            class="form-control" id="NameRead">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="CountryRead">Country</label>
                                                        <input disabled type="text" value="{{ $item->country }}"
                                                            class="form-control" id="CountryRead">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="EmailRead">Name</label>
                                                        <input disabled type="email" value="{{ $item->email }}"
                                                            class="form-control" id="EmailRead">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="positionRead">position</label>
                                                        <input disabled type="text" value="{{ $item->position }}"
                                                            class="form-control" id="positionRead">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Description1Read">Description 1</label>
                                                    <input disabled type="text" class="form-control" id="Description1Read"
                                                        value="{{ $item->description_1 }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Description2Read">Description 2</label>
                                                    <input disabled type="text" class="form-control" id="Description2Read"
                                                        value="{{ $item->description_2 }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Description3Read">Description 3</label>
                                                    <input disabled type="text" class="form-control" id="Description3Read"
                                                        value="{{ $item->description_3 }}">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="ContactPersonRead">Contact Person</label>
                                                        <input disabled type="type" value="{{ $item->contact_person }}"
                                                            class="form-control" id="ContactPersonRead">
                                                    </div>

                                                </div>
                                                  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="ProjectsDoneRead">Projects Done</label>
      <input disabled type="text" value="{{ $item->projects_done }}" class="form-control" id="ProjectsDoneRead">
    </div>
    <div class="form-group col-md-4">
      <label for="ExperienceRead">Experience </label>
      <input disabled type="text" value="{{ $item->projects_done }}" class="form-control" id="ExperienceRead">
    </div>
    <div class="form-group col-md-4">
      <label for="SatisficationRead">Satisfication </label>
      <input disabled type="text" value="{{ $item->satisfication }}" class="form-control" id="SatisficationRead">
    </div> 
   
   
  </div>



                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-warning" href="{{ route('information.edit', $item->id) }}">Edit</a>
                            <button
                                class="btn {{ $actives[0]['information_id'] == $item['id'] ? 'btn-secondary' : 'btn-danger' }} activate-information-btn"
                                data-toggle="modal"
                                data-target="#deleteInformationModal{{ $item->id }}">Delete</button>
                            <div class="modal fade" id="deleteInformationModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="deleteInformationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteInformationModalLabel">Confirmation to
                                                delete
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete this information?</p>
                                            <p id="delete-test-id-modal"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('information.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Yes, I'm sure</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button {{ $actives[0]['information_id'] == $item['id'] ? 'disabled' : '' }}
                                class="btn  {{ $actives[0]['information_id'] == $item['id'] ? 'btn-secondary' : 'btn-primary' }} activate-information-btn"
                                data-toggle="modal" data-target="#activateInformationModal{{ $item->id }}"
                                data-id="{{ $item['id'] }}">
                                {{ $actives[0]['information_id'] == $item['id'] ? 'Activated' : 'Active' }}</button>
                    </td>
                    <div class="modal fade" id="activateInformationModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="activateInformationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="activateInformationModalLabel">Confirmation to activate
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to activate this information?</p>
                                    <p id="activate-test-id-modal"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form method="POST" action="{{ route('set_active_information', $item->id) }}">
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
                    <h5 class="card-title mb-2">Information {{ $item['id'] }}</h5>
                    <p class="card-text">{{ $item['description_1'] }}</p>
                    <a class="btn btn-warning" href="{{ route('information.edit', $item['id']) }}">Edit</a>
                    <button  class="btn btn-danger delete-information-btn" data-toggle="modal" data-target="#deleteInformationModal" data-id="{{ $item['id'] }}">Delete</button>
                </div>
            </div> --}}
        @endforeach
        </tbody>
    </table>




@endsection
