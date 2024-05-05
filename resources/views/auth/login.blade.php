@extends('base.layout')
@section('title')
page de login 
@endsection

@section('content')
<div class="row d-flex flex-column justify-content-center align-items-center">
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
        <h1>Formule de login :</h1>
    </div>
    <div class="col-md-6">
        <form method="POST" action="{{url('/login')}}" >
            @csrf
            
              
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            
          
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
    </div>
</div>
@endsection