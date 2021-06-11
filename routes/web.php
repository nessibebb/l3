<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainesController;
use App\Http\Controllers\EtageresController;
use App\Http\Controllers\OuvragesController;
use App\Http\Controllers\AffectationsController;


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


Route::view('/', 'welcome');

Route::resource('domaines', DomainesController::class);
Route::resource('etageres', EtageresController::class);
Route::resource('ouvrages', OuvragesController::class);
Route::resource('afectations', AffectationsController::class);

Route::post('ouvrages/emp/${nom_dom}', 'OuvragesController@emp');




