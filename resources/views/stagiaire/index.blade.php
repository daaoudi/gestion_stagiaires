@extends('base.layout')
@section('title')
Listes des Stagiaires
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
        <a href="{{ route('stagiaire.create') }}" class="btn btn-sm btn-block btn-success">Ajouter </a>
    </div>
    <div class="col-md-auto">
        <h1 class="fw-bold">Liste des Stagiaires</h1>
        
    </div>
    <div class="col-md-auto">
        <table class="table table-striped">
            <tr>
                <th>Nom</th><th>Prenom</th> <th>Etablissement</th> <th>Filiere</th> 
                <th>CIN</th> <th>Encadrant</th> <th> sujet de Stage</th> <th>type de Stage</th> <th>Action</th>
            </tr>
            @foreach ($stagiaires as $s)
            <tr>
                <td>{{$s->nom}}</td>
                <td>{{$s->prenom}}</td>
                <td>{{$s->etablissement}}</td>
                <td> {{$s->filiere}} </td>
                <td> {{$s->cin}} </td>
                <td> {{$s->encadrent->nom ." " . $s->encadrent->prenom}} </td>
                <td> {{$s->stage->sujet}} </td>
                <td> {{$s->stage->type}} </td>
                <td class="text-wrap d-flex flex-column justify-content-center align-items "><a href="{{route('stagiaire.edit',$s->id)}}" class="btn btn-sm btn-primary d-inline-block my-1">Edit</a>
                    <form action="{{route('stagiaire.destroy',$s->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    </form>
                    <button type="submit" onclick="event.preventDefault(); if(confirm('are you sure you want to delete this \'Stagiaire\''))
                    document.getElementById('{{$s->id}}').submit();" class="btn btn-sm btn-danger my-1">Supp</button>
                    
                    <a href="{{route('stagiaire.show',$s->id)}}" class="btn btn-sm btn-warning d-inline-block my-1">Voir</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
   
</div>

@endsection