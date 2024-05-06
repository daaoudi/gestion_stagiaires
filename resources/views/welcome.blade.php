@extends('base.layout')
@section('title')
Gestion des Stagiaires 
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="">Welcome 
            @if (Auth::check())
                @if(Auth::user()->is_admin)
                    {{ Auth::user()->nom }}
                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">Logout</a>
                    <a href="{{route('admin.dashboard')}}" class="btn btn-sm btn-primary">Dashboard</a>
                @else
                    {{ Auth::user()->nom }}
                    <form id="user-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();">Logout</a>
                   
                @endif
            @else
                <p>Anonyme</p>
                <p>S'il vous plaît, authentifiez-vous pour utiliser l'application.</p>
                <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-secondary">Signin</a>
            @endif
        </h1>
        
    </div>
</div>

@endsection