<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    private $model = 'Users';

    public static function getLogin($r)
    {
        dd($r->input());
    }
}
