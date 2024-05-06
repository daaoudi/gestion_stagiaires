@extends('base.layout')

@section('title')

User Profile : @if(Auth::check() )
{{auth()->user()->user_type }}
@endif

@endsection
@section('content')
<div class="row my-4 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-12">
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">{{ session('success') }}</div>
        @endif
    </div>
    <div class="col-md-6">
        <h1 class="fw-bold">User Profile</h1>
    </div>
    <div class="col-md-6">
        @if(Auth::check())
        <p>Nom : {{auth()->user()->nom}}</p>
        <p>Prenom : {{auth()->user()->prenom}}</p>
        <p>Email : {{auth()->user()->email}}</p>
        <p>User Type : {{auth()->user()->user_type}}</p>
        @else 
        <a href="{{route('login')}}" class="btn btn-sm btn-primary">Login</a>
        @endif
    </div>
</div>

@endsection