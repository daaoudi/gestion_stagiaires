<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Stage;
use App\Models\Encadrent;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

   
    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Logout the user
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $encadrents=Encadrent::all();
        $nbrEncadrents=count($encadrents);

        $stages=Stage::all();
        $nbrStages=count($stages);

        $stagiaires=Stagiaire::all();
        $nbrStagiaires=count($stagiaires);

        return view('admin.admin_dashboard',compact('nbrEncadrents','nbrStages','nbrStagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
