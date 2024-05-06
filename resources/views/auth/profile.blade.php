@extends('base.layout')

@section('title')

User Profile : @if(Auth::check() )
{{auth()->user()->user_type }}
@endif

@endsection
@section('content')
<div class="row my-4 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-12">
        @php
            $user = auth()->user();
            $msg='Vous êtes maintenant connecté!';
        @endphp
      
      
        <div class="alert alert-success text-center" role="alert">{{ $msg }}</div>
        
    </div>
    <div class="col-md-6">
        <h1 class="fw-bold">User Profile</h1>
    </div>
    <div class="col-md-6">
        @if(Auth::check())
        <p>Nom : {{$user->nom}}</p>
        <p>Prenom : {{$user->prenom}}</p>
        <p>Email : {{$user->email}}</p>
        <p>User Type : {{$user->user_type}}</p>
        @else 
        <a href="{{route('login')}}" class="btn btn-sm btn-primary">Login</a>
        @endif

        <a href="/" class="btn btn-sm btn-primary">Home</a>
        <form id="user-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();">Logout</a>
    </div>
</div>

@endsection