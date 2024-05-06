@extends('base.layout')
@section('title')
Listes des Stages
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
        <a href="{{ route('stage.create') }}" class="btn btn-sm btn-block btn-success">Ajouter </a>
    </div>
    <div class="col-md-auto">
        <h1 class="fw-bold">Liste des Stages</h1>
        
    </div>
    <div class="col-md-auto">
        <table class="table table-striped">
            <tr>
                <th>Sujet</th><th>Date debut</th><th>Date fin</th> <th>Type</th> <th>Action</th>
            </tr>
            @foreach ($stages as $s)
            <tr>
                <td>{{$s->sujet}}</td>
                <td>{{$s->date_debut}}</td>
                <td>{{$s->date_fin}}</td>
                <td>{{$s->type}}</td>
                <td><a href="{{route('stage.edit',$s->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{route('stage.destroy',$s->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    </form>
                    <button type="submit" onclick="event.preventDefault(); if(confirm('are you sure you want to delete this \'Stage\''))
                    document.getElementById('{{$s->id}}').submit();" class="btn btn-sm btn-danger">Supp</button>
                    
                   
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
    
</div>

@endsection