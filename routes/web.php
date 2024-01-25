<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\MountainAbleController;

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


Route::get('/detail', function () {
    return view('detail');
});

Route::get('/index', [LandingController::class, 'index']);
Route::get('/mountaindetails/{id}', [LandingController::class, 'show']);


Auth::routes(['verify'=>true]);


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::resource('/addmountains', MountainController::class)->middleware('auth');
Route::resource('/mountainables', MountainAbleController::class)->middleware('auth');

Route::get('changeStatus', 'MountainController@changeStatus')->middleware('auth');;

Route::resource('/regulations', RegulationController::class)->middleware('auth');