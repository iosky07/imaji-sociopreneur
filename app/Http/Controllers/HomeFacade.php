<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

class HomeFacade extends Facade
{
    public static function getHome(){
        return Home::find(1);
    }
}
