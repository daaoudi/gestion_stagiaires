@extends('base.layout')
@section('title')
Enregistrement d'un Stagiaire
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
        <form method="POST" action="{{url('/stagiaire')}}" class="mb-3" >
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
                <label for="cin" class="form-label">CIN:</label>
                <input type="text" class="form-control" id="cin" name="cin">
                
              </div>
              <div class="mb-3">
                <label for="etablissement" class="form-label">Etablissement :</label>
                <input type="text" class="form-control" id="etablissement" name="etablissement">
                
              </div>
              <div class="mb-3">
                <label for="filiere" class="form-label">Filire :</label>
                <input type="text" class="form-control" id="filiere"  name="filiere">
                
              </div>
              <div class="mb-3 " >
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                     <label for="date_naissance" class="form-label mx-2">Date Naissance : </label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                </div>
               
                
              </div>
              <div class="mb-3">
                <label for="telephone" class="form-label">Telephone :</label>
                <input type="text" class="form-control" id="telephone"  name="telephone">
                
              </div>
              <div class="mb-3">
                <label for="encadrent_id" class="form-label">Choisir un Encadrant</label>
                <select class="form-select" name="encadrent_id">
                    
                    @foreach($encadrents as $e)
                    
                    <option selected  > Choisir un Encadrant </option>
                    
                    <option class="fw-bold " value={{$e->id}}>{{$e->nom." ".$e->prenom ." --->".$e->filiere}}</option>    
                    
                    @endforeach
                    
                  </select>
              </div>

              <div class="mb-3">
                <label for="stage_id" class="form-label">Choisir une Stage</label>
                <select class="form-select" name="stage_id">
                    <option >Choisir Stage</option>
                    @foreach($stages as $s)
                    <option value="{{$s->id}}" class="fw-bold"><b> {{$s->sujet}}</b> </option>
                    @endforeach
                    
                  </select>
              </div>
          
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
    </div>
</div>


@endsection