<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the input data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'user_type'=>'required|string|max:20'
        ]);

      

   

        $user = User::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type' => $request->input('user_type'),
           
           
        ]);

        // Login the user after registration
        Auth::login($user);

        // Redirect to the home page or dashboard
        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        
        if (Auth::attempt($request->only('email', 'password'))) {
            if(auth()->user()->is_admin){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/user')->with(['success'=>'Vous êtes maintenant connecté!']);
            }
            
            
        } else {
            
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function userProfile(){

       
   
        $id = Auth::user()->id;
        $user = User::find($id);
   
        return view('auth.profile',compact('user'));
    }

    public function editProfile( $id){
        $user=User::findOrFail($id);
        return view('auth.edit',compact('user'));
  
      }

      public function updateProfile(Request $req, $id){
        $req->validate([
          'nom' => 'required|string',
          'prenom'=>'required|string',
          'email' => 'required|email',
          'password' => 'required|string|min:6',
          
          'user_type'=>'required',
      ]);
      $user = User::findOrFail($id);
  
    
      $user->update([
        'nom' => $req->nom,
        'prenom'=>$req->prenom,
        'email' => $req->email,
        'password' => bcrypt($req->password),
       
       'user_type'=>$req->user_type
    ]);
    //
    return redirect('/user')->with(['success'=>'modifier avec succés']);
  
  
      }
  
      public function deleteProfile($id){
       
        try {
          $user = User::findOrFail($id);
          $user->delete();
          return redirect('/register')->with(['success' => 'supprimer avec succés']);
      } catch (\Exception $e) {
          // Log or handle the error
          return redirect('/register')->with(['error' => 'il y a un  erreur de suppression ! ']);
      }
      }


}
