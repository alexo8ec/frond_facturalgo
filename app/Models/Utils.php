<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class Utils extends Model
{
    private $model = 'Utils';

    public static function getTodo($controller)
    {
        $baseUrl = env('API_ENDPOINT_PRODUCCION') . "v1/sistema/" . $controller;
        $response = Http::withToken(session('token'))->get($baseUrl);
        $quizzes = json_decode($response->body());
        return $quizzes;
    }
}
