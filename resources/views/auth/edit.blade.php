@extends('base.layout')
@section('title')
Modification de Profile : {{$user->nom ." ". $user->prenom}}
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
        <h1>Formule de Registration :</h1>
    </div>
    <div class="col-md-6">
        <form method="POST" action="{{route('user.update',$user->id)}}" class="mb-3" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" value="{{$user->nom}}" id="nom" name="nom">
                
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" value="{{$user->prenom}}" name="prenom">
                
              </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" value="{{  $user->password}}" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                @if(auth()->user()->user_type==='stagiaire')
              <div class="form-check">
                
                  <input class="form-check-input" type="radio" name="user_type" id="user_type_stagiaire" value="stagiaire">
                  <label class="form-check-label" for="user_type_stagiaire">
                      Stagiaire
                  </label>
              </div>
              @else
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="user_type" id="user_type_encadrent" value="encadrent" checked>
                  <label class="form-check-label" for="user_type_encadrent">
                      Encadrent
                  </label>
              </div>
              @endif
             
          </div>
          
            <button type="submit" class="btn btn-primary">Modifier</button>
          </form>
    </div>
</div>
@endsection