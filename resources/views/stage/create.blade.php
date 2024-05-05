@extends('base.layout')
@section('title')
Enregistrement d'une Stage 
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
        <h1>Ajouter une Stage</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{url('/stage')}}" class="mb-3" >
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="sujet" class="form-label">Sujet :</label>
                <input type="text" class="form-control" id="sujet" name="sujet">
                
              </div>
              <div class="mb-3 " >
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                     <label for="date_debut" class="form-label mx-2">Date debut : </label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut">
                </div>
               
                
              </div>
            
              <div class="mb-3 " >
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                     <label for="date_fin" class="form-label mx-2">Date fin : </label>
                <input type="date" class="form-control " id="date_fin"  name="date_fin">
                </div>
               
                
              </div>
              <div class="mb-3">
                <label for="type" class="form-label">Type :</label>
                <input type="text" class="form-control" id="type" name="type">
                
              </div>
          
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
    </div>
</div>


@endsection