<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class Users extends Model
{
    private $model = 'Users';

    public static function getUsers()
    {
        $baseUrl = env('API_ENDPOINT_PRODUCCION') . "v1/users/" . session('idUsuario');
        $response = Http::withToken(session('token'))->get($baseUrl);
        $quizzes = json_decode($response->body());
        return $quizzes;
    }
    public static function saveRegister($r)
    {
        $arrayData = [
            'user' => $r->user,
            'name' => $r->name,
            'last_name' => $r->last_name,
            'email' => $r->email
        ];
        $baseUrl = env('API_ENDPOINT_PRODUCCION') . "v1/users";
        $response = Http::post($baseUrl, $arrayData);
        $quizzes = json_decode($response->body());
        return $quizzes;
    }
    public static function getLogin($r)
    {
        $arrayData = [
            'user' => $r->user,
            'password' => $r->password,
        ];
        $baseUrl = env('API_ENDPOINT_PRODUCCION') . "v1/login";
        $response = Http::post($baseUrl, $arrayData);
        $quizzes = json_decode($response->body());
        return $quizzes;
    }
}
