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

/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

Route::group(['namespace' => 'Login'], function() {
    Route::get('/login', ['as' => 'login.index', 'uses' => 'LoginController@index']);
    Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@postindex']);
    Route::get('/logout', ['as' => 'login.logout', 'uses' => 'LoginController@logout']);
});

Route::group(['middleware' => [/*'auth', 'is_admin'*/], 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/index', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/', ['as' => 'admin.usuarios.index', 'uses' => 'UsuariosController@index']);
        Route::get('/editar/{id}/funcionarios', ['as' => 'admin.usuarios.edit_func', 'uses' => 'UsuariosController@edit']);
        Route::put('/actualizar/{id}/funcionarios', ['as' => 'admin.usuarios.update', 'uses' => 'UsuariosController@update']);
        Route::get('/editar/{id}/docentes', ['as' => 'admin.usuarios.edit_doc', 'uses' => 'UsuariosController@edit']);
        Route::put('/actualizar/{id}/docentes', ['as' => 'admin.usuarios.update', 'uses' => 'UsuariosController@update']);
        Route::get('/editar/{id}/estudiantes', ['as' => 'admin.usuarios.edit_est', 'uses' => 'UsuariosController@edit']);
        Route::put('/actualizar/{id}/estudiantes', ['as' => 'admin.usuarios.update', 'uses' => 'UsuariosController@update']);

    });
    Route::group(['prefix' => 'guardar'], function () {
        Route::post('/archivo/funcionario/', ['as' => 'rol.archivo.funcionario', 'uses' => 'UsuariosController@rolesFuncionariosArchivos']);
        Route::post('/archivo/docente/', ['as' => 'rol.archivo.docente', 'uses' => 'UsuariosController@rolesDocentesArchivos']);
        Route::post('/archivo/estudiante/', ['as' => 'rol.archivo.estudiante', 'uses' => 'UsuariosController@rolesEstudiantesArchivos']);
    });
    Route::group(['prefix' => 'campus'], function () {
        Route::get('/', ['as' => 'admin.campus.index', 'uses' => 'CampusController@index']);
        Route::post('/guardar', ['as' => 'admin.campus.store', 'uses' => 'CampusController@store']);
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_campus', 'uses' => 'CampusController@edit']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_campus', 'uses' => 'CampusController@update']);
    });
    Route::group(['prefix' => 'facultad'], function () {
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_f', 'uses' => 'FacultadController@edit']);
        Route::post('/guardar', ['as' => 'admin.campus.store_f', 'uses' => 'FacultadController@store']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_f', 'uses' => 'FacultadController@update']);
    });
    Route::group(['prefix' => 'departamento'], function () {
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_d', 'uses' => 'DepartamentosController@edit']);
        Route::post('/guardar', ['as' => 'admin.campus.store_d', 'uses' => 'DepartamentosController@store']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_d', 'uses' => 'DepartamentosController@update']);
    });
    Route::group(['prefix' => 'escuela'], function () {
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_e', 'uses' => 'EscuelasController@edit']);
        Route::post('/guardar', ['as' => 'admin.campus.store_e', 'uses' => 'EscuelasController@store']);
        Route::post('/guardar/archivo', ['as' => 'admin.campus.file_e', 'uses' => 'EscuelasController@file_escuelas']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_e', 'uses' => 'EscuelasController@update']);
    });
});

/*
 * Rut de encargado para probar: 30111969  -  70399590  -  72661190
 */

Route::group(['middleware' => ['auth', 'is_encargado'],'prefix' => 'encargado', 'namespace' => 'EncargadoCampus'], function () {
    Route::get('/index/', ['as' => 'encargado.index', 'uses' => 'EncargadoController@index']);
    Route::get('/personas/', ['as' => 'encargado.personas.index', 'uses' => 'EncargadoController@index_personas']);

    Route::get('/editar/estudiante/{id}', ['as' => 'encargado.estudiante.editar', 'uses' => 'EncargadoController@editEstudiante']);
    Route::post('/guardar/estudiante', ['as' => 'encargado.add.estudiante', 'uses' => 'PersonasController@addEstudiante']);
    Route::put('/actualizar/estudiante/{id}', ['as' => 'encargado.estudiante.update', 'uses' => 'PersonasController@updateEstudiante']);
    Route::post('/guardar/archivo/estudiante/', ['as' => 'encargado.archivo.estudiante', 'uses' => 'UsuarioArchivoController@archivosEstudiantes']);
    Route::post('/guardar/asignatura-cursada', ['as' => 'encargado.estudiante.ac', 'uses' => 'EncargadoController@a_cEstudiante']);

    Route::get('/editar/docente/{id}', ['as' => 'encargado.docente.editar', 'uses' => 'EncargadoController@editDocente']);
    Route::post('/guardar/docente', ['as' => 'encargado.add.docente', 'uses' => 'PersonasController@addDocente']);
    Route::put('/actualizar/docente/{id}', ['as' => 'encargado.docente.update', 'uses' => 'PersonasController@updateDocente']);
    Route::post('/guardar/archivo/docente/', ['as' => 'encargado.archivo.docente', 'uses' => 'UsuarioArchivoController@archivosDocentes']);

    Route::get('/editar/funcionario/{id}', ['as' => 'encargado.funcionario.editar', 'uses' => 'EncargadoController@editFuncionario']);
    Route::post('/guardar/funcionario', ['as' => 'encargado.add.funcionario', 'uses' => 'PersonasController@addFuncionario']);
    Route::put('/actualizar/funcionario/{id}', ['as' => 'encargado.funcionario.update', 'uses' => 'PersonasController@updateFuncionario']);
    Route::post('/guardar/archivo/funcionario/', ['as' => 'encargado.archivo.funcionario', 'uses' => 'UsuarioArchivoController@archivosFuncionarios']);


    Route::get('/academicos', ['as' => 'encargado.academicas.index', 'uses' => 'AcademicosController@index']);

    Route::post('/academicos/guardar/carrera', ['as' => 'encargado.add.carrera', 'uses' => 'AcademicosController@storeCarreras']);
    Route::get('/academicos/editar/carrera/{id}', ['as' => 'encargado.academicos.edit_carrera', 'uses' => 'AcademicosController@editCarreras']);
    Route::put('/actualizar/carrera/', ['as' => 'encargado.actualizar.carrera', 'uses' => 'AcademicosController@updateCarreras']);
    Route::post('/academicos/archivo/carrera', ['as' => 'encargado.archivo.carrera', 'uses' => 'ArchivosController@carreraArchivo']);

    Route::post('/academicos/guardar/asignatura', ['as' => 'encargado.add.asignatura', 'uses' => 'AcademicosController@storeAsignatura']);
    Route::get('/academicos/editar/asignatura/{id}', ['as' => 'encargado.academicos.edit_asignatura', 'uses' => 'AcademicosController@editAsignatura']);
    Route::put('/actualizar/asignatura/', ['as' => 'encargado.actualizar.asignatura', 'uses' => 'AcademicosController@updateAsignatura']);
    Route::post('/academicos/archivo/asignatura', ['as' => 'encargado.archivo.asignatura', 'uses' => 'ArchivosController@asignaturaArchivo']);

    Route::post('/academicos/guardar/curso', ['as' => 'encargado.add.curso', 'uses' => 'AcademicosController@storeCurso']);
    Route::get('/academicos/editar/curso/{id}', ['as' => 'encargado.academicos.edit_curso', 'uses' => 'AcademicosController@editCurso']);
    Route::put('/actualizar/curso/', ['as' => 'encargado.actualizar.curso', 'uses' => 'AcademicosController@updateCurso']);
    Route::post('/academicos/archivo/curso', ['as' => 'encargado.archivo.curso', 'uses' => 'ArchivosController@cursoArchivo']);

    Route::group(['prefix' => 'salas'], function() {
        Route::get('/index', ['as' => 'encargado.salas.index', 'uses' => 'SalasController@index']);
        Route::post('/guardar', ['as' => 'encargado.add.sala', 'uses' => 'SalasController@salaAdd']);
        Route::get('/editar/{id}', ['as' => 'encargado.edit.sala', 'uses' => 'SalasController@salaEdit']);
        Route::put('/actualizar/', ['as' => 'encargado.update.sala', 'uses' => 'SalasController@salaUpdate']);
        Route::post('/curso', ['as' => 'encargado.add.sala_curso', 'uses' => 'SalasController@salasAddCurso']);
        Route::delete('/borrar/{id}', ['as' => 'encargado.salas.delete', 'uses' => 'SalasController@salaDelete']);
        Route::delete('/borrar/horario/{id}', ['as' => 'encargado.hsalas.delete', 'uses' => 'SalasController@horarioDelete']);
        Route::post('/archivos', ['as' => 'encargado.archivo.salas', 'uses' => 'SalasController@salaArchivo']);
    });
});


/* Rut de estudiante: 31896711 */
Route::group(['prefix' => 'estudiante', 'namespace' => 'Estudiante'], function () {
    Route::get('/inicio', ['as' => 'estudiante.index', 'uses' => 'EstudianteController@index']);
    Route::get('/horario/{id}', ['as' => 'estudiante.horario', 'uses' => 'EstudianteController@horarioEstudiante']);
    Route::get('/consultar/{id}', ['as' => 'estudiante.consulta', 'uses' => 'EstudianteController@consultaEstudiante']);
    Route::post('/resultado/horarios/', ['as' => 'estudiante.resultado.salas', 'uses' => 'EstudianteController@consultaEstudiante']);
});

Route::group(['prefix' => 'docente', 'namespace' => 'Docente'], function () {
    Route::get('/inicio/', ['as' => 'docente.index', 'uses' => 'DocenteController@index']);
});