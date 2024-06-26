<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\EncadrentController;
use App\Http\Controllers\StagiaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[AuthController::class,'showRegistrationForm']);
Route::get('/login',[AuthController::class,'showLoginForm']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);



// Route::post('/admin/login', [AdminController::class,'login'])->name('admin.login.submit');
//  Route::get('/admin/login', [AdminController::class,'showLoginForm'])->name('admin.login');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user',[AuthController::class,'userProfile'])->name('user.profile');
    Route::get('/user/edit/{id}',[AuthController::class,'editProfile'])->name('user.edit');
    Route::delete('/user/destroy/{id}',[AuthController::class,'deleteProfile'])->name('user.deleteProfile');
    Route::put('/user/update/{id}',[AuthController::class,'updateProfile'])->name('user.update');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    //dashboard
    Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    
    //encadrent routes
    Route::resource('encadrent',EncadrentController::class);

    //stage routes
    Route::resource('stage',StageController::class);

    //stagiaire routes
    Route::get('stagiaire/imprimer/{id}',[StagiaireController::class,'imprimerAttestation'])->name('stagiaire.imprimer');
    Route::resource('stagiaire',StagiaireController::class);

    //absence routes

    Route::resource('absence',AbsenceController::class);

});

