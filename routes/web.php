<?php
use App\Http\Controllers\InicioController;

$router->group(['prefix' => ''], function ($router) {
    /*Inicio*/
    $router->get('/', [InicioController::class, 'index']);
    $router->match(['get', 'post'], 'inicio/{submodulo}', [InicioController::class, 'index']);
});