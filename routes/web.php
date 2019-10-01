<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Status routes
$router->get('/{credential}', 'StatusController@show');

// Sync routes
$router->post('/sync/put',    ['middleware' => 'apiAuth', 'SyncController@put']);
$router->get('/sync/current', ['middleware' => 'apiAuth', 'SyncController@current']);