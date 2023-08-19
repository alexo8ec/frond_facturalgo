<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Info extends Model
{
    private $model = 'Info';
    public static function getInfo()
    {
        $baseUrl = env('API_ENDPOINT_PRODUCCION') . "v1/info";
        $response = Http::get($baseUrl);
        $quizzes = json_decode($response->body());
        return $quizzes;
    }
}
