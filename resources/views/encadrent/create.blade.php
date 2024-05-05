@extends('base.layout')
@section('title')
Enregistrement d'un Encadrant 
@endsection

@section('content')
<div class="row my-5 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    
    <div class="col-md-6">
        <h1>Ajouter un encadrant</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{url('/encadrent')}}" class="mb-3" >
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom">
                
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
                
              </div>
            
              <div class="mb-3">
                <label for="filiere" class="form-label">Filire :</label>
                <input type="text" class="form-control" id="filiere"  name="filiere">
                
              </div>
          
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
    </div>
</div>


@endsection