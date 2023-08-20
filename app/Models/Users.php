<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Users extends Model
{
    private $model = 'Users';

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
