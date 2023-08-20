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
        if ($r->submodulo == '') {
            $data['title'] = 'Bienvenid@ | ' . $info->data->name_info . ' V' . $info->data->version_info;
            return view('login/view_login', $data);
        } elseif ($r->submodulo == 'login') {
            $mensaje = Users::getLogin($r);
            if ($mensaje != '') {
                return redirect('/')->with(['message' => $mensaje]);
            } else {
                return redirect('admin');
            }
        }
    }
}
