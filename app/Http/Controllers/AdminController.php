<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $controlador = 'admin';
    public function index(Request $r)
    {
        $info = Info::getInfo();
        $data['info'] = $info->data;
        $data['user'] = Users::getUsers();
        $data['title'] = 'Bienvenid@ | ' . $info->data->name_info . ' V' . $info->data->version_info;
        if ($r->submodulo == '') {
            return view($this->controlador . '.view_plantilla', $data);
        }
    }
}
