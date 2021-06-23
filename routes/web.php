<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainesController;
use App\Http\Controllers\EtageresController;
use App\Http\Controllers\OuvragesController;
use App\Http\Controllers\AffectationsController;
use App\Http\Controllers\ExemplaireController;
use App\Http\Controllers\DynamicPDFController;
use App\Http\Controllers\DynamicPDFOController;
use App\Http\Controllers\DynamicPDFEController;
use App\Http\Controllers\DynamicPDFXController;
use App\Http\Controllers\DynamicPDFAController;
use App\Http\Controllers\EtiquetesController;
use App\Http\Controllers\DynamicPDFETController;
use App\Http\Controllers\DomaineExController;
use App\Http\Controllers\OuvragesExController;
use App\Http\Controllers\EtageresExController;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('domaines', DomainesController::class);
Route::resource('etageres', EtageresController::class);
Route::resource('ouvrages', OuvragesController::class);
Route::resource('afectations', AffectationsController::class);
Route::resource('exemplaires', ExemplaireController::class);
Route::resource('etiquetes', EtiquetesController::class);
Route::post('ouvrages/emp/${nom_dom}', 'OuvragesController@emp');

Route::get('/dynamic_pdf', 'App\Http\Controllers\DynamicPDFController@index');
Route::get('/dynamic_pdf/pdf', 'App\Http\Controllers\DynamicPDFController@pdf');
Route::get('/dynamic_pdfo', 'App\Http\Controllers\DynamicPDFOController@index');
Route::get('/dynamic_pdfo/pdfO', 'App\Http\Controllers\DynamicPDFOController@pdfO');
Route::get('/dynamic_pdfe', 'App\Http\Controllers\DynamicPDFEController@index');
Route::get('/dynamic_pdfe/pdfE', 'App\Http\Controllers\DynamicPDFEController@pdfE');
Route::get('/dynamic_pdfx', 'App\Http\Controllers\DynamicPDFXController@index');
Route::get('/dynamic_pdfx/pdfX', 'App\Http\Controllers\DynamicPDFXController@pdfX');
Route::get('/dynamic_pdfa', 'App\Http\Controllers\DynamicPDFAController@index');

Route::get('/dynamic_pdfa/pdfA', 'App\Http\Controllers\DynamicPDFAController@pdfA');
Route::get('/dynamic_pdfet', 'App\Http\Controllers\DynamicPDFETController@index');
Route::get('/dynamic_pdfet/pdfET', 'App\Http\Controllers\DynamicPDFETController@pdfET');
Route::resource('DomaineEx', DomaineExController::class); 
Route::resource('OuvrageEx', OuvragesExController::class);
Route::resource('EtagereEx', EtageresExController::class);  

