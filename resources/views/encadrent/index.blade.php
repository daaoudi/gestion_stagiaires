@extends('base.layout')
@section('title')
Listes des Encadrents
@endsection

@section('content')
<div class="row d-flex flex-column justify-content-center align-items">
    <div class="col-md-auto text-center fw-bold">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
            
        @endif
    </div>
    <div class="col-md-auto my-3">
        <a href="{{ route('encadrent.create') }}" class="btn btn-sm btn-block btn-success">Ajouter </a>
    </div>
    <div class="col-md-auto">
        <h1 class="fw-bold">Liste des Encadrants</h1>
        
    </div>
    <div class="col-md-auto">
        <table class="table table-striped">
            <tr>
                <th>Nom</th><th>Prenom</th><th>Filiere</th><th>Action</th>
            </tr>
            @foreach ($encadrents as $e)
            <tr>
                <td>{{$e->nom}}</td>
                <td>{{$e->prenom}}</td>
                <td>{{$e->filiere}}</td>
                <td><a href="{{route('encadrent.edit',$e->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{route('encadrent.destroy',$e->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    </form>
                    <button type="submit" onclick="event.preventDefault(); if(confirm('are you sure you want to delete this \'Encadrant\''))
                    document.getElementById('{{$e->id}}').submit();" class="btn btn-sm btn-danger">Supp</button>
                    
                    <a href="{{route('encadrent.show',$e->id)}}" class="btn btn-sm btn-warning">Voir</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
   
</div>

@endsection