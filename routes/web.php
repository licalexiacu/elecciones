<?php

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

// Usuarios que no estan autenticado
Route::group(['middleware'=>['guest']],function(){
	Route::get('/','Auth\LoginController@showLoginForm');
	Route::post('/login','Auth\LoginController@login')->name('login');
});

// Usuarios Autenticados
Route::group(['middleware'=>['auth']],function(){
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('/main', function () {
	    return view('dashboard.homepage');
		//return view('contenido.contenido');
	})->name('main');

	// Usuarios
	Route::get('user','UsersController@index');
	Route::post('/user/store','UsersController@store');
	Route::put('/user/update','UsersController@update');
	Route::put('/user/desactivar','UsersController@desactivar');
	Route::put('/user/activar','UsersController@activar');
	Route::put('/Auth/update_password','UsersController@updatePassword');
	Route::get('/user/get','UsersController@get');
	Route::get('/user/select','UsersController@select');

	//Roles
	Route::get('rol','RolesController@index');
	Route::get('/rol/select','RolesController@select');

	// Padron
	Route::get('padron','PadronController@index');
	Route::get('/padron/select','PadronController@select');
	Route::put('/padron/update','PadronController@update');

	// Punteo
	Route::get('punteo','PunteoController@index');
	Route::put('/punteo/punteo','PunteoController@punteo');
	Route::get('/punteo/listado','PunteoController@punteo_listado')->name('punteo_listado_pdf');

	// Comida
	Route::get('comida','ComidaController@index');
	Route::put('/comida/comida','ComidaController@comida');

	// Notas
	Route::get('notas','NotasController@index');
	Route::post('/notas/store','NotasController@store');
	Route::put('/notas/update','NotasController@update');
	Route::put('/notas/update_escritorio','NotasController@update_escritorio');
	Route::put('/notas/archivar','NotasController@archivar');
	Route::put('/notas/destroy','NotasController@destroy');
	Route::get('/notas/select','NotasController@select');

	// Conteo
	Route::get('conteo','ConteoController@index');
	Route::post('/conteo/store','ConteoController@store');
	Route::put('/conteo/update','ConteoController@update');
	Route::put('/conteo/destroy','ConteoController@destroy');
	Route::put('/conteo/update_conteo','ConteoController@update_conteo');
	Route::get('/conteo/get','ConteoController@get');

	// Graficos
	Route::get('/graficos/general','GraficosController@graficos');

	// Combustible
	Route::get('combustible','CombustibleController@index');
	Route::put('/combustible/store','CombustibleController@store');
	Route::put('/combustible/update','CombustibleController@update');
	Route::get('/combustible/select','CombustibleController@select');

	// Combustible Carga
	Route::get('combustible_carga','Combustible_CargaController@index');
	Route::put('/combustible_carga/store','Combustible_CargaController@store');
	Route::get('/combustible_carga/listado','Combustible_CargaController@combustible_listado')->name('combustible_listado_pdf');
});

//Route::get('/home', 'HomeController@index')->name('home');
