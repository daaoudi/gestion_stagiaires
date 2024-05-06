@extends('base.layout')
@section('title')
Imprimer Attestation : {{$stagiaire->nom ." ". $stagiaire->prenom}}
@endsection

@section('content')
<div class="row my-5 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-12">
        <h1 class="fw-bold" >Attestation de Stage :</h1>
    </div>
    <div class="col-md-12 ">
        <h2 class="fw-bold" >Stagiaire</h2>
        <p>Nom du stagiaire: {{ $stagiaire->nom }} {{ $stagiaire->prenom }}</p>
            <p>Date de naissance: {{ $stagiaire->date_naissance }}</p>
            <p>CIN: {{ $stagiaire->cin }}</p>
            <p>Etablissement : {{$stagiaire->etablissement}}</p>
            <p>Filiere : {{$stagiaire->filiere}}  </p>
    </div>
    <div class="col-md-12 ">
        <h2 class="fw-bold" >Stage</h2>
        <p>Sujet du stage: {{ $stagiaire->stage->sujet }}</p>
        <p>Date de début: {{ $stagiaire->stage->date_debut }}</p>
        <p>Date de fin: {{ $stagiaire->stage->date_fin }}</p>
        <p> Type de stage : {{$stagiaire->stage->type}} </p>
    </div>
    <div class="col-md-12 ">
        <h2 class="fw-bold" >Encadrant</h2>
            <p>Nom de l'encadrant: {{ $stagiaire->encadrent->nom }} {{ $stagiaire->encadrent->prenom }}</p>
            <p>Filière: {{ $stagiaire->encadrent->filiere }}</p>
    </div>
    <div class="col-md-6 my-3 d-grid gap-2 ">
        <button class="btn btn-primary" onclick="window.print()">Imprimer</button>
    </div>
</div>



@endsection