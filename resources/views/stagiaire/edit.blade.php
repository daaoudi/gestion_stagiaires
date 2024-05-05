@extends('base.layout')
@section('title')
Modification d'un Stagiaire : {{$stagiaire->nom ." ". $stagiaire->prenom}}
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
        <h1>Ajouter un stagiaire</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{url('/stagiaire/'.$stagiaire->id)}}" class="mb-3" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" value="{{$stagiaire->nom}}" name="nom">
                
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" value="{{$stagiaire->prenom}}" name="prenom">
                
              </div>
              <div class="mb-3">
                <label for="cin" class="form-label">CIN:</label>
                <input type="text" class="form-control" id="cin" value="{{$stagiaire->cin}}" name="cin">
                
              </div>
              <div class="mb-3">
                <label for="etablissement" class="form-label">Etablissement :</label>
                <input type="text" class="form-control" value="{{$stagiaire->etablissement}}" id="etablissement" name="etablissement">
                
              </div>
              <div class="mb-3">
                <label for="filiere" class="form-label">Filire :</label>
                <input type="text" class="form-control" value="{{$stagiaire->filiere}}" id="filiere"  name="filiere">
                
              </div>
              <div class="mb-3 " >
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                     <label for="date_naissance" class="form-label mx-2">Date Naissance : </label>
                    <input type="date" class="form-control" value="{{$stagiaire->date_naissance}}" id="date_naissance" name="date_naissance">
                </div>
               
                
              </div>
              <div class="mb-3">
                <label for="telephone" class="form-label">Telephone :</label>
                <input type="text" class="form-control" id="telephone" value="{{$stagiaire->telephone}}"  name="telephone">
                
              </div>
              <div class="mb-3">
                <label for="encadrent_id" class="form-label">Choisir un Encadrant</label>
                <select class="form-select" name="encadrent_id">
                    
                    @foreach($encadrents as $e)
                    @if($e->id===$stagiaire->encadrent_id)
                    <option selected value="{{$e->id}}" class="fw-bold "> {{$e->nom ." ". $e->prenom ." --->".$e->filiere}} </option>
                    @else
                    <option  value={{$e->id}}>{{$e->nom." ".$e->prenom ." --->".$e->filiere}}</option>    
                    @endif
                    @endforeach
                    
                  </select>
              </div>

              <div class="mb-3">
                <label for="stage_id" class="form-label">Choisir une Stage</label>
                <select class="form-select" name="stage_id">
                
                    @foreach($stages as $s)
                    @if($s->id===$stagiaire->stage_id)
                    <option selected value="{{$s->id}}" class="fw-bold"><b> {{$s->sujet}}</b> </option>
                    @else 
                    <option  value="{{$s->id}}">{{$s->sujet}}</option>  
                    @endif
                    @endforeach
                    
                  </select>
              </div>
          
            <button type="submit" class="btn btn-primary">Modifier</button>
          </form>
    </div>
</div>


@endsection