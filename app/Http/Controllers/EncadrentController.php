<?php

namespace App\Http\Controllers;

use App\Models\Encadrent;
use Illuminate\Http\Request;

class EncadrentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $encadrents=Encadrent::all();
        return view('encadrent.index',compact('encadrents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("encadrent.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'nom' => 'required',
            'prenom'=>'required',
            'filiere'=>'required'
        ]);
        
        $encadrent=new Encadrent();
        $encadrent->nom=$request->get('nom');
        $encadrent->prenom=$request->get('prenom');
        $encadrent->filiere=$request->get('filiere');
        
        $encadrent->save();
        return redirect('/encadrent')->with('success','Enregistrement effectué avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Encadrent $encadrent)
    {
        //
        return view('encadrent.show',compact('encadrent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encadrent $encadrent)
    {
        //
       
        return view('encadrent.edit')->with(['encadrent'=>$encadrent]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encadrent $encadrent)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prenom'=>'required',
            'filiere'=>'required'
        ]);
        $encadrent->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'filiere'=>$request->filiere
        ]);
        return redirect()->route('encadrent.index')
                        ->with('success','Modification réussie!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encadrent $encadrent)
    {
        //
        $encadrent->delete();
        return redirect()->route('encadrent.index')
                        ->with('success','Suppression réussie!');  
    }
}
