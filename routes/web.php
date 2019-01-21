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

Route::get('/', function () {
    return view('welcome');
});

//Route::post('/deploy','DeploymentController@deploy');
// routes/web.php
Route::post('/deploy', function () {
    $path = base_path();
    $token = 'token';
    $json = json_decode(file_get_contents('php://input'), true);

    if (empty($json['token']) || $json['token'] !== $token) {
        exit('error request');
    }

    $cmd = "cd $path && git pull";
    shell_exec($cmd);
});