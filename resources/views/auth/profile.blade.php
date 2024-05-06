@extends('base.layout')

@section('title')

User Profile : {{$user->nom ." ". $user->prenom}}

@endsection
@section('content')
<div class="row my-4 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-12">
      
        <a href="/" class="btn btn-sm btn-primary">Home</a>
        <form id="user-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();">Logout</a>
      @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">{{ session('success') }}</div>
        @endif
        
    </div>
    <div class="col-md-12">
        <h1 class="fw-bold">User Profile</h1>
    </div>
    <div class="col-md-12">
       
        <table class="table table-striped">
            <tr>
                <th>Nom</th><th>Prenom</th><th>Email</th><th>Type d'utilisateur</th><th>Action</th>
            </tr>
            <tr>
                <td> {{$user->nom}} </td>
                <td> {{$user->prenom}} </td>
                <td> {{$user->email}}</td>
                <td> {{$user->user_type}} </td>
                <td> <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-primary" >Edit</a>
                    <form action="{{route('user.deleteProfile',$user->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        </form>
                        <button type="submit" onclick="event.preventDefault(); if(confirm('are you sure you want to delete your \'Profile\''))
                        document.getElementById('{{$user->id}}').submit();" class="btn btn-sm btn-danger">Supp</button>
                
                </td>
            </tr>
        </table>
      
        

       
    </div>
</div>

@endsection