<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function(){
    return "API-with-Lumen";
});
$router->get('/siswa', 'API\SiswaController@index');
$router->get('/siswa/{id}', 'API\SiswaController@show');
$router->post('/siswa', 'API\SiswaController@create');
$router->put('/siswa/update/{id}', 'API\SiswaController@update');
$router->delete('/siswa/delete/{id}', 'API\SiswaController@destroy');

