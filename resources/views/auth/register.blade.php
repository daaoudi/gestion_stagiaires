@extends('base.layout')
@section('title')
Formule de registration 
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
        <form method="POST" action="{{url('/register')}}" class="mb-3" >
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom">
                
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
                
              </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="user_type" id="user_type_stagiaire" value="stagiaire">
                  <label class="form-check-label" for="user_type_stagiaire">
                      Stagiaire
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="user_type" id="user_type_encadrent" value="encadrent" checked>
                  <label class="form-check-label" for="user_type_encadrent">
                      Encadrent
                  </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" disabled type="radio" name="user_type" id="user_type_admin" value="admin" >
                <label class="form-check-label" for="user_type_admin">
                    Admin
                </label>
            </div>
          </div>
          
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
    </div>
</div>
@endsection