<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Encadrent;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $stagiaires = Stagiaire::with('encadrent', 'stage')->get();
    return view('stagiaire.index', compact('stagiaires'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $encadrents=Encadrent::all();
        $stages=Stage::all();
        return view("stagiaire.create", compact('encadrents','stages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'cin'=>'required',
            'etablissement'=>'required',
            'filiere'=>'required',
            'date_naissance'=>'required|date',
            'telephone'=>'required|numeric|min:10',
            'encadrent_id'=>'required|exists:encadrents,id',
            'stage_id'=>'required|exists:stages,id'
        ]);
        Stagiaire::create($request->all());
        return redirect()->route('stagiaire.index')->with(['success'=>'stagiaire Enregistrer avec succes ']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        //
        return view('stagiaire.show',compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        //
        $encadrents=Encadrent::all();
        $stages=Stage::all();
        return view('stagiaire.edit',compact('stagiaire','encadrents','stages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        //
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'cin'=>'required',
            'etablissement'=>'required',
            'filiere'=>'required',
            'date_naissance'=>'required|date',
            'telephone'=>'required|numeric|min:10',
            'encadrent_id'=>'required|exists:encadrents,id',
            'stage_id'=>'required|exists:stages,id'
        ]);
        $stagiaire->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'cin'=>$request->cin,
            'etablissement'=>$request->etablissement,
            'filiere'=>$request->filiere,
            'date_naissance'=>$request->date_naissance,
            'telephone'=>$request->telephone,
            'encadrent_id'=>$request->encadrent_id,
            'stage_id'=>$request->stage_id
        ]);
        return redirect()->route('stagiaire.index') -> with(['success'=>"Modification effectuée avec succès"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        //
        $stagiaire->delete();
        return redirect()->route('stagiaire.index') -> with(['success'=>"Suppression effectuée avec succès"]);
    }

    public function imprimerAttestation($id)
{
    // Retrieve the stagiaire with the specified ID
    $stagiaire = Stagiaire::with(['stage', 'encadrent'])->findOrFail($id);

    // Pass the stagiaire data to the view
    return view('stagiaire.imprimer', compact('stagiaire'));
}
}
