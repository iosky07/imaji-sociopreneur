<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        return view('pages.team.index',[
            'team'=>Team::class
        ]);
    }

    public function create()
    {
        return view('pages.team.create');
    }


    public function edit($id)
    {
        return view('pages.team.edit',compact('id'));
    }
}
