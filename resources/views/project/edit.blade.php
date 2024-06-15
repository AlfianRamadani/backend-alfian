@extends('layouts.master')
@section('title', 'Project')
@section('currentPage', 'Project ')

@section('content')
    <div class="">
        <div class=" mb-2">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div>
            <a href="{{ route('project.index') }}" class="btn btn-primary">Go Back</a>

        </div>
        <form action={{ route('project.update', $selectedEditId) }} method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
          

            <div class="card-body">
                @foreach ($form as $key => $value)
                    @foreach ($value as $item)
                    @if ($item['type'] == "file")
                              <label for="inputGroupFile01">Featured Image</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="{{ $item['name'] }}"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                                
                    @else
                         <div class="form-group">
                            <label for="{{ $item['name'] }}Input">{{ ucfirst($item['name']) }}</label>
                            <input type="{{ $item['type'] }}"
                                class="form-control @error($item['name']) is-invalid @enderror"
                                id="{{ $item['name'] }}Input" value="{{ $item['value'] }}"
                                placeholder="Enter {{ $item['name'] }} " name="{{ $item['name'] }}">
                            @error($item['name'])
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                        </div>
                    @endif
                       
                    @endforeach
                @endforeach

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->
@endsection
