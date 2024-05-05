@extends('base.layout')
@section('title')
Modifier d'un Encadrant : {{$encadrent->nom . " " . $encadrent->prenom}} 
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
        <h1>Modifier un encadrant</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{url('encadrent/'.$encadrent->id)}}" class="mb-3" >
            @csrf
            @method('PUT')
           
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" value="{{ old('nom', $encadrent->nom) }}" name="nom">
                
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" value="{{ old('prenom', $encadrent->prenom) }}" name="prenom">
                
              </div>
            
              <div class="mb-3">
                <label for="filiere" class="form-label">Filire :</label>
                <input type="text" class="form-control" id="filiere" value="{{ old('filiere', $encadrent->filiere) }}"  name="filiere">
                
              </div>
          
            <button type="submit" class="btn btn-primary">Modifier</button>
          </form>
    </div>
</div>


@endsection