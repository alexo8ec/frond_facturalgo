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
        if ($r->submodulo == '') {
            $opcions = Utils::getTodo($this->controlador);
            $data['info'] = $opcions->data->info;
            $data['user'] = $opcions->data->user;
            $data['moduls'] = $opcions->data->moduls;
            $data['title'] = ucwords(strtolower($this->controlador)) . ' | ' . $data['info']->name_info . ' V' . $data['info']->version_info;
            if ($r->submodulo == '') {
            }
            config(['data' => $data]);
            return view('layouts.view_child');
        }
    }
}
