<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class RabController extends Controller
{

    public function index()
    {
        return view('pages.rab.index',[
            'rab'=>Finance::class
        ]);
    }

    public function create()
    {
        return view('pages.rab.create');
    }


    public function edit($id)
    {
        return view('pages.rab.edit',compact('id'));
    }
}
