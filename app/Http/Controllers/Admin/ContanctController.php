<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContanctController extends Controller
{

    public function index()
    {
        return view('pages.content.index');
    }

    public function create()
    {
        return view('pages.testimonial.create');
    }


    public function edit($id)
    {
        return view('pages.testimonial.edit',compact('id'));
    }
}
