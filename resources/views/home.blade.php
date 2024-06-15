@extends("layouts.master")
@section('title', "Home")
@section("currentPage", "Dashboard")

@section('status')
      @if (session('Signin_status'))
    <div class="alert alert-success" role="alert">

        {{session('Signin_status')}}
</div>
    @endif
@endsection

@section('content')

    <p>dawd</p>
    
<!-- Modal -->

@endsection