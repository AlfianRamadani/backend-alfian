@extends('layouts.master')
@section('title', 'Add Project')
@section('currentPage', 'Add Project ')

@section('content')
    <div class="">
        <div>
            <a href="{{ route('information.index') }}" class="btn btn-primary">Go Back</a>

        </div>
        <form action={{ route('project.store') }} method="POST" enctype="multipart/form-data">
            @csrf


            <div class="card-body">
                @foreach ($form as $key => $value)
                    @foreach ($value as $item)
                 
                        @if ($item['type'] == 'file')
                  
                            @else
                                       <div class="form-group">
                            <label for="{{ $item['name'] }}Input">{{ ucfirst($item['name']) }}</label>
                            <input type="{{ $item['type'] }}" class="form-control @error($item['name']) is-invalid @enderror"
                                id="{{ $item['name'] }}Input" placeholder="Enter {{ $item['name'] }} "
                                name="{{ $item['name'] }}">
                            @error($item['name'])
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                        </div>
                        @endif
                    @endforeach
                @endforeach

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add Data</button>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->

@endsection
