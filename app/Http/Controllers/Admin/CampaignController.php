<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function index()
    {
        return view('pages.campaign.index',[
            'campaign'=>Campaign::class
        ]);
    }

    public function create()
    {
        return view('pages.campaign.create');
    }


    public function edit($id)
    {
        return view('pages.campaign.edit',compact('id'));
    }
}
