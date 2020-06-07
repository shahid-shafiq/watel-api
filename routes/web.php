<?php

use Illuminate\Support\Facades\Route;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

Route::get('client/{id?}', 'ClientController@index');
Route::post('client', 'ClientController@create');
Route::put('client/{id}', 'ClientController@update');

/*
$uri = "client";
$router->post($uri, function() {
    return "client";
});

$router->put($uri, function() {
    return "client";
});

$router->patch($uri, function() {
    return "client";
});

$router->delete($uri, function() {
    return "Delete";
});

$router->options($uri, function() {
    return "Options";
});
*/