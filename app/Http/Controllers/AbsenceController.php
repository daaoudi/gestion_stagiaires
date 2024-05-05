<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $stagiaires = DB::table('stagiaires')
        ->leftJoin('stages', 'stagiaires.stage_id', '=', 'stages.id')
        ->leftJoin('absences', 'stagiaires.id', '=', 'absences.stagiaire_id')
        ->select(
            'stagiaires.id as stagiaire_id',
            'stagiaires.nom as stagiaire_nom',
            'stagiaires.prenom as stagiaire_prenom',
            'stages.sujet as stage_sujet',
            'absences.justification',
            'absences.date_debut',
            'absences.date_fin',
            'absences.id'
        )
        ->whereNotNull('absences.justification') // Filter only stagiaires with absences
        ->get();

    return view('absence.index', compact('stagiaires'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $stagiaires=Stagiaire::all();
        return view("absence.create", compact('stagiaires'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'justification'=>'required',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date|after:date_debut',
            'stagiaire_id'=>'required|exists:stagiaires,id',
        ]);
        Absence::create($request->all());
        return redirect()->route('absence.index')->with(['success'=>'Enregistrement abscence avec succes' ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        //
        $stagiaires = Stagiaire::all();
        return view('absence.edit',compact('absence','stagiaires'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absence $absence)
    {
        //
        $request->validate([
            'justification'=>'required',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date|after:date_debut',
            'stagiaire_id'=>'required|exists:stagiaires,id',
        ]);
        $absence->update([
            'justification'=>$request->justification,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'stagiaire_id'=>$request->stagiaire_id,
        ]);
        return redirect()->route('absence.index')->with(['success'=>'Modification reussi avec succes ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
        $absence->delete();
        return redirect()->route('absence.index')->with(['success'=>'Suppresion reussi avec succes ']);
    }
}
