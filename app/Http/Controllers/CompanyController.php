<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Users;
use App\Models\Utils;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $controlador = 'company';
    public function index(Request $r)
    {
        if (session('idUsuario') == '') {
            return redirect('/');
        }
        $opcions = Utils::getTodo($this->controlador);
        $data['info'] = $opcions->data->info;
        $data['user'] = $opcions->data->user;
        $data['modules'] = $opcions->data->modules;
        $data['companies'] = $opcions->data->companies;
        $data['submodulo'] = $r->submodulo;
        $data['controlador'] = $this->controlador;
        $data['title'] = ucwords(strtolower($this->controlador)) . ' | ' . $data['info']->name_info . ' V' . $data['info']->version_info;
        if ($r->submodulo == 'companyselector') {
            session(['idEmpresa' => $r->id]);
            return redirect('/admin');
        }
        config(['data' => $data]);
        return view('layouts.view_child');
    }
}
