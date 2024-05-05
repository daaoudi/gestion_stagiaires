@extends('base.layout')
@section('title')
Listes des Absences
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
        <a href="{{ route('absence.create') }}" class="btn btn-sm btn-block btn-success">Ajouter </a>
    </div>
    <div class="col-md-auto">
        <h1 class="fw-bold">Liste des Absences</h1>
        
    </div>
    <div class="col-md-auto">
        <table class="table table-striped">
            <tr>
                <th>justification</th><th>Date debut</th><th>Date fin</th> <th>Stagiaire</th> <th>Stage</th> <th>Action</th>
            </tr>
            @foreach ($stagiaires as $s)
            <tr>
                <td>{{$s->justification}}</td>
                <td>{{$s->date_debut}}</td>
                <td>{{$s->date_fin}}</td>
                <td>{{$s->stagiaire_nom ." " . $s->stagiaire_prenom}}</td>
                <td> {{$s->stage_sujet}} </td>
                <td><a href="{{route('absence.edit',$s->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{route('absence.destroy',$s->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    </form>
                    <button type="submit" onclick="event.preventDefault(); if(confirm('are you sure you want to delete this \'Stage\''))
                    document.getElementById('{{$s->id}}').submit();" class="btn btn-sm btn-danger">Supp</button>
                    
                    <a href="{{route('absence.show',$s->id)}}" class="btn btn-sm btn-warning">Voir</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
    
</div>

@endsection