<!-- ======= Header ======= -->
<header id="header" class=" d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="/">Gestion des stagiaires <span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="//assets///img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          @if (Auth::check())
          @if(auth()->user()->nom==='admin')
          <li><a class="nav-link scrollto" href="{{route('stagiaire.index')}}">Liste des Stagiaires</a></li>
          <li><a class="nav-link scrollto" href="{{route('encadrent.index')}}">Liste des Encadrants</a></li>
          <li><a class="nav-link scrollto" href="{{route('stage.index')}}">Liste des Stages</a></li>
          <li><a class="nav-link scrollto" href="{{route('absence.index')}}">Marquer Absence</a></li>
          @endif
          
          @else 
          <li><a class="nav-link scrollto" href="#">Bienvenu !</a></li>
          @endif
      </nav><!-- .navbar -->

      <a href="#about" class="get-started-btn scrollto">About us</a>
    </div>
  </header><!-- End Header -->