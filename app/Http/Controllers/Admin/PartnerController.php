<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
//        $partner=Partner::class;
//        return view('pages.partner.index',compact('partner'));
        return view('pages.partner.index',['partner'=>Partner::class]);
    }

    public function create()
    {
        return view('pages.partner.create');
    }


    public function edit($id)
    {
        return view('pages.partner.edit',compact('id'));
    }
}
