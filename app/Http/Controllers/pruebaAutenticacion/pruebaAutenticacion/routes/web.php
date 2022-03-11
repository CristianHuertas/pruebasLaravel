<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
//use app\http\Controllers\PagesController;


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
//route::get('/', 'App\Http\Controllers\PagesController@inicio')->name('inicio');;

Route::resource('notas', NotaController::class);
//Route::resource('nota', 'App\Http\Controllers\NotaController');
//Route::resource('/notas', 'App\Http\Controllers\NotaController');
//Route::resource('notas', 'App\Http\Controllers\NotaController');
Route::resources([
    'notas' => 'App\Http\Controllers\NotaController',
    'posts' => 'App\Http\Controllers\NotaController'
]); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
