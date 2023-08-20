<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InicioController extends Controller
{
    private $controlador = 'inicio';
    public function index(Request $r)
    {
        $info = Info::getInfo();
        $data['info'] = $info->data;
        $data['title'] = 'Bienvenid@ | ' . $info->data->name_info . ' V' . $info->data->version_info;
        if ($r->submodulo == '') {
            return view('login/view_login', $data);
        } elseif ($r->submodulo == 'login') {
            $mensaje = Users::getLogin($r);
            if (isset($mensaje->message) && $mensaje->message != 'success|Ingreso correcto') {
                return redirect('/')->with(['message' => $mensaje->message]);
            } else {
                session(['token' => $mensaje->data->token, 'idUsuario' => $mensaje->data->user->id]);
                return redirect('admin');
            }
        } elseif ($r->submodulo == 'register') {
            return view('login/view_register', $data);
        } elseif ($r->submodulo == 'saveRegister') {

            $mensaje = Users::saveRegister($r);
            return redirect('/inicio/register')->with(['message' => $mensaje->message, 'data' => $r->input()]);
        }
    }
}
