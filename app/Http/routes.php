<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get('/', 'WelcomeController@index');

Route::get('login/{id}', 'LoginController@index');

Route::post('login/{id}', 'LoginController@postLogin');

Route::get('logout', 'LoginController@logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admini'], function() {
    Route::get('index', 'AdminController@index');
    Route::resource('campus', 'CampusController');
    /**/
    Route::resource('usuarios', 'UsuarioController', ['only' => ['index']]);
    Route::get('usuarios/{id}/{tipo}', ['as' => 'admin.usuarios.edit', 'uses' => 'UsuarioController@edit']);
    Route::put('usuarios/{id}/{tipo}/{rut}', ['as' => 'admin.usuarios.update', 'uses' => 'UsuarioController@update']);
});

Route::group(['prefix' => 'encargado', 'namespace' => 'ECampus'], function () {
    Route::get('index', 'EncargadoController@index');
    Route::resource('salas', 'SalasController');
    /*Tipos de sala*/
    Route::post('/tipo-salas', ['as' => 'encargado.tiposala.store', 'uses' => 'TipoSalasController@store']);
    Route::get('/tipo-salas/edit/{id}', ['as' => 'encargado.tiposala.edit', 'uses' => 'TipoSalasController@edit']);
    Route::put('tipo-salas/{id}', ['as' => 'encargado.tiposala.update', 'uses' => 'TipoSalasController@update']);
    /*Asignar sala*/
    Route::resource('asignar', 'AsignarController');
    /*Datos Academicos*/
    Route::get('ingreso-datos', ['as' => 'encargado.ingreso-datos.index', 'uses' => 'IngresoDatosController@index']);

        /**Datos Academicos -> Asignatura*/
        Route::post('asignatura',
            ['as' => 'encargado.ingreso-datos.store_asig', 'uses' => 'IngresoDatosController@store_asignatura']);
        Route::get('asignatura/{id}',
            ['as' => 'encargado.ingreso-datos.edit_asig', 'uses' => 'IngresoDatosController@edit_asignatura']);
        Route::put('asignatura/{id}',
            ['as' => 'encargado.ingreso-datos.update_asig', 'uses' => 'IngresoDatosController@update_asignatura']);
        /**Datos Academicos -> Asignatura*/

        /**Datos Academicos -> Curso*/
        Route::post('curso',
            ['as' => 'encargado.ingreso-datos.store_curso', 'uses' => 'IngresoDatosController@store_curso']);
        Route::get('curso/{id}',
            ['as' => 'encargado.ingreso-datos.edit_curso', 'uses' => 'IngresoDatosController@edit_curso']);
        Route::put('curso/{id}',
            ['as' => 'encargado.ingreso-datos.update_curso', 'uses' => 'IngresoDatosController@update_curso']);
        /**Datos Academicos -> Curso*/

        /**Datos Académicos -> Carrera*/
        Route::post('carrera',
            ['as' => 'encargado.ingreso-datos.store_carrera', 'uses' => 'IngresoDatosController@store_carrera']);
        Route::get('carrera/{id}',
            ['as' => 'encargado.ingreso-datos.edit_carrera', 'uses' => 'IngresoDatosController@edit_carrera']);
        Route::put('carrera/{id}',
            ['as' => 'encargado.ingreso-datos.update_carrera', 'uses' => 'IngresoDatosController@update_carrera']);
        /**Datos Académicos -> Carrera*/

    /**Datos Académicos -> Estudiante*/
    Route::post('estudiante',
        ['as' => 'encargado.ingreso-datos.store_estudiante', 'uses' => 'IngresoDatosController@store_estudiante']);
    Route::get('estudiante/{id}',
        ['as' => 'encargado.ingreso-datos.edit_estudiante', 'uses' => 'IngresoDatosController@edit_estudiante']);
    Route::put('estudiante/{id}',
        ['as' => 'encargado.ingreso-datos.update_estudiante', 'uses' => 'IngresoDatosController@update_estudiante']);
    Route::get('revisar-estudiante/{id}',
        ['as' => 'encargado.revisar.index', 'uses' => 'RevisarEstudianteController@index']);
    Route::post('revisar-estudiante/',
        ['as' => 'encargado.revisar.ac', 'uses' => 'RevisarEstudianteController@asignatura_c']);
    /**Datos Académicos -> Estudiante*/



});