<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Main;

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
    return view('welcome');
});
Route::get('add',[Main::class,"add"]);
Route::post('insert',[Main::class,"insert"]);
Route::get('show',[Main::class,"show"]);
Route::get('edit/{id}',[Main::class,"editt"]);
Route::post('updated',[Main::class,"updated"]);
Route::get('delete/{id}',[Main::class,"delete"]);