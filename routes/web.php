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
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    //encadrent routes
    Route::resource('encadrent',EncadrentController::class);

    //stage routes
    Route::resource('stage',StageController::class);

    //stagiaire routes
    Route::resource('stagiaire',StagiaireController::class);

    //absence routes

    Route::resource('absence',AbsenceController::class);

});

