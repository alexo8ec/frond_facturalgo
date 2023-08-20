<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Users;
use App\Models\Utils;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $controlador = 'admin';
    public function index(Request $r)
    {
        if (session('idUsuario') == '') {
            return redirect('/');
        }
        $opcions = Utils::getTodo($this->controlador);
        echo '<pre>';
        print_r($opcions);
        exit;
        $data['info'] = $opcions->data->info;
        $data['user'] = $opcions->data->user;
        $data['moduls'] = $opcions->data->moduls;
        $data['companies'] = $opcions->data->companies;

        $data['title'] = ucwords(strtolower($this->controlador)) . ' | ' . $data['info']->name_info . ' V' . $data['info']->version_info;
        if ($r->submodulo == '') {
            if (session('idEmpresa') != '') {
                $data['content'] = view($this->controlador . '.view_admin');
            } else {
                $data['content'] = view($this->controlador . '.view_seleccionar_empresa');
            }
        } elseif ($r->submodulo == 'logout') {
            session(['token' => '', 'idUsuario' => '', 'idEmpresa' => '']);
            return redirect('/');
        }
        config(['data' => $data]);
        return view('layouts.view_child');
    }
}
