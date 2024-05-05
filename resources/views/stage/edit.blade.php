@extends('base.layout')
@section('title')
Modification d'une Stage : {{$stage->sujet}}
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
        <h1>Modifier une Stage</h1>
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{route('stage.update',$stage->id)}}" class="mb-3" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="sujet" class="form-label">Sujet :</label>
                <input type="text" value="{{old('sujet',$stage->sujet)}}" class="form-control" id="sujet" name="sujet">
                
              </div>
              <div class="mb-3 " >
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                     <label for="date_debut" class="form-label mx-2">Date debut : </label>
                    <input type="date" value="{{old('sujet',$stage->date_debut)}}" class="form-control" id="date_debut" name="date_debut">
                </div>
               
                
              </div>
            
              <div class="mb-3 " >
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                     <label for="date_fin" class="form-label mx-2">Date fin : </label>
                <input type="date" class="form-control " value="{{old('sujet',$stage->date_fin)}}" id="date_fin"  name="date_fin">
                </div>
               
                
              </div>
              <div class="mb-3">
                <label for="type" class="form-label">Type :</label>
                <input type="text" value="{{old('sujet',$stage->type)}}" class="form-control" id="type" name="type">
                
              </div>
          
            <button type="submit" class="btn btn-primary">Modifier</button>
          </form>
    </div>
</div>


@endsection