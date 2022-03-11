<?php

use Illuminate\Support\Facades\Route;
use app\http\Controllers\PagesController;

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
route::get('/', 'App\Http\Controllers\PagesController@inicio')->name('inicio');;

//route::get('inicio', 'App\Http\Controllers\PagesController@inicio')->name('inicio');;

route::get('/detalle/{id}', 'App\Http\Controllers\PagesController@detalle')->name('notas.detalle');;

//metodo para crear datos
route::post('/crear/', 'App\Http\Controllers\PagesController@crear')->name('notas.crear');

//metodo para consulta el dato para luego editarlo
route::get('/editar/{id}', 'App\Http\Controllers\PagesController@editar')->name('notas.editar');

// metodo para editar lo consultado
route::put('/editar/{id}', 'App\Http\Controllers\PagesController@update')->name('notas.update');


route::delete('/eliminar/{id}', 'App\Http\Controllers\PagesController@eliminar')->name('notas.eliminar');




//cambio para git
//cambio para github


/* Route::get('/', function () {
    return view('welcome');
}); */

route::get('fotos', 'App\Http\Controllers\PagesController@fotos')->name('foto');;

/* Route::get('fotos', function () {
    return view('fotos');
    })->name('foto'); */

route::get('/blog', 'App\Http\Controllers\PagesController@blog')->name('noticias');;

/* Route::get('blog', function () {
    return view('blog');
})->name('noticias'); */


route::get('/nosotros/{nombre?}', 'App\Http\Controllers\PagesController@nosotros')->name('nosotros');;

/* route::get('nosotros/{nombre?}', function($nombre = null) {
    $equipo = ['Ignacio', 'Juanito', 'Pedrito'];
    
    //return view('nosotros', ['equipo'=>$equipo], ['nombre'=>$nombre]);
    return view('nosotros', compact("equipo"), compact('nombre'));

})->name('nosotros'); */


/* Route::get('fotos/{numero?}', function ($numero= 'sin numero') {
    return 'Estas en la vista de fotos: '.$numero;
})->where('numero', '[0-9]+'); */

//si pone en la ruta "galeria", redirecciona a "fotos" envia el parametro 125, como una variable a "fotos"
//Route::view('galeria', 'fotos', ['numero'=> 125]);