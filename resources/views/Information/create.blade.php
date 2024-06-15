@extends('layouts.master')
@section('title', 'Information')
@section('currentPage', 'Information ')

@section('content')
    <div class="">
        <div>
            <a href="{{ route('information.index') }}" class="btn btn-primary">Go Back</a>

        </div>
        <form action={{ route('information.store') }} method="POST" enctype="multipart/form-data">
            @csrf
        

            <div class="card-body">
                @foreach ($form as $key => $value)
                    @foreach ($value as $item)
                        <div class="form-group">
                            <label for="{{ $item['name'] }}Input">{{ ucfirst($item['name']) }}</label>
                            <input type="{{ $item['type'] }}"
                                class="form-control @error($item['name']) is-invalid @enderror"
                                id="{{ $item['name'] }}Input"
                                placeholder="Enter {{ $item['name'] }} " name="{{ $item['name'] }}">
                            @error($item['name'])
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                        </div>
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
