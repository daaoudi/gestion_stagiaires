@extends('base.layout')
@section('title')
Modifier une absence : {{$absence->justification}}
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
        <h1>Modifier une Absence</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{url('/absence/'.$absence->id)}}" class="mb-3" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="justification" class="form-label">Justification :</label>
                <input type="text" class="form-control" id="justification" value="{{$absence->justification}}" name="justification">
                
              </div>
              <div class="mb-3 " >
                <div class="input-group " >
                     <label for="date_debut" class="form-label mx-2">Date debut : </label>
                    <input type="datetime-local" class="form-control" value="{{$absence->date_debut}}" id="date_debut" name="date_debut">
                </div>
               
                
              </div>
            
              <div class="mb-3 " >
                <div class="input-group " >
                     <label for="date_fin" class="form-label mx-2">Date fin : </label>
                <input type="datetime-local" class="form-control " value="{{$absence->date_fin}}" id="date_fin"  name="date_fin">
                </div>
               
                
              </div>
              <div class="mb-3">
                <label for="stagiaire_id" class="form-label">Choisir un Stagiaire</label>
                <select class="form-select" name="stagiaire_id">
                    
                    @foreach($stagiaires as $s)
                    @if($s->id===$absence->stagiaire_id)
                    <option selected value="{{$s->id}}" class="fw-bold "><b> {{$s->nom ." ". $s->prenom}}</b> </option>
                    @else 
                    <option  value="{{$s->id}}" class="fw-bold "><b> {{$s->nom ." ". $s->prenom}}</b> </option>
                    @endif
                    @endforeach
                    
                  </select>
              </div>
          
            <button type="submit" class="btn btn-primary">Modifier</button>
          </form>
    </div>
</div>


@endsection