<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stages= Stage::all();
        return view('stage.index',compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("stage.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sujet'=>'required',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date|after:date_debut',
            'type'=>'required'
        ]);
        $stage = new Stage();
        $stage->sujet=$request->input('sujet');
        $stage->date_debut=$request->input('date_debut');
        $stage->date_fin=$request->input('date_fin');
        $stage->type=$request->input('type');
        $stage->save();
        return redirect()->route('stage.index')
        ->with(['success'=>'Enregistrement de Stage avec succes !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
        return view('stage.show',compact('stage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        //
        return view("stage.edit", compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stage $stage)
    {
        //
        $request->validate([
            'sujet'=>'required',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date|after:date_debut',
            'type'=>'required'
        ]);
        $stage->update([
            'sujet'=>$request->sujet,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'type'=>$request->type
        ]);
        return redirect()->route('stage.index')
        ->with(['success'=>'Stage Modifie avec succes ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage)
    {
        //
       $stage->delete();
       return redirect()->route('stage.index')
       ->with(['success'=>'stage supprimer avec succes']);
    }
}
