<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/simpletable', function(){
    return view('simpletable');
})->name('simpletable');
Route::get('/datatable', function (){
    return view('datatable');
})->name('datatable');

Route::get('/home', function (){
    return view('welcome');
});

Route::get('/ajax-form', 'HomeController@ajax_form');
Route::post('/ajax', 'HomeController@ajax');
