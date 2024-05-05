@extends('base.layout')
@section('title')
Marquer une absence 
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
        <h1>Marquer une Absence</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{url('/absence')}}" class="mb-3" >
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="justification" class="form-label">Justification :</label>
                <input type="text" class="form-control" id="justification" name="justification">
                
              </div>
              <div class="mb-3 " >
                <div class="input-group " >
                     <label for="date_debut" class="form-label mx-2">Date debut : </label>
                    <input type="datetime-local" class="form-control" id="date_debut" name="date_debut">
                </div>
               
                
              </div>
            
              <div class="mb-3 " >
                <div class="input-group " >
                     <label for="date_fin" class="form-label mx-2">Date fin : </label>
                <input type="datetime-local" class="form-control " id="date_fin"  name="date_fin">
                </div>
               
                
              </div>
              <div class="mb-3">
                <label for="stagiaire_id" class="form-label">Choisir un Stagiaire</label>
                <select class="form-select" name="stagiaire_id">
                    <option selected>Choisir un Stagiaire</option>
                    @foreach($stagiaires as $s)
                    <option value="{{$s->id}}" class="fw-bold "><b> {{$s->nom ." ". $s->prenom}}</b> </option>
                    @endforeach
                    
                  </select>
              </div>
          
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
    </div>
</div>


@endsection