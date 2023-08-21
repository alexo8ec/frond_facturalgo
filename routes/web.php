<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InicioController;

$router->group(['prefix' => ''], function ($router) {
    /*Inicio*/
    $router->get('/', [InicioController::class, 'index']);
    $router->match(['get', 'post'], 'inicio/{submodulo}', [InicioController::class, 'index']);
    /*Admin*/
    $router->get('admin/', [AdminController::class, 'index']);
    $router->match(['get', 'post'], 'admin/{submodulo}', [AdminController::class, 'index']);
    /*Company*/
    $router->get('company/', [CompanyController::class, 'index']);
    $router->match(['get', 'post'], 'company/{submodulo}', [CompanyController::class, 'index']);
});
