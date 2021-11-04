<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Rutas manejandas por la aplicacion */
Route::get("/",[HomeController::class, 'index']);

Route::post("/reservation",[AdminController::class, 'createreservation']);

Route::get("/viewreservation",[AdminController::class, 'reservationlist'])->name('reservationlist');

Route::post("/reservationstatus/{id}",[AdminController::class, 'reservationstatus']);

Route::get("/viewchef",[AdminController::class, 'viewchef']);

Route::post("/savechef",[AdminController::class, 'createchef']);

Route::get("/updatechefview/{id}",[AdminController::class, 'updatechefview']);

Route::post("/updatedatachef/{id}",[AdminController::class, 'updatedatachef']);

Route::get("/deletechef/{id}",[AdminController::class, 'destroychef']);

Route::get("/users",[AdminController::class, 'userlist']);

Route::get("/deleteuser/{id}",[AdminController::class, 'destroy']);

Route::get("/foodmenu",[AdminController::class, 'menulist']);

Route::post("/uploadmenu",[AdminController::class, 'uploadmenu']);

Route::get("/deletemenu/{id}",[AdminController::class, 'destroymenu']);

Route::get("/updatemenu/{id}",[AdminController::class, 'updatemenu']);

Route::post("/postupdatemenu/{id}",[AdminController::class, 'postupdatemenu']);

Route::get("/redirects",[HomeController::class, 'redirects']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
