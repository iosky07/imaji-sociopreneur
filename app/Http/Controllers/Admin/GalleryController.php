<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        return view('pages.gallery.index',[
            'gallery'=>Gallery::class
        ]);
    }

    public function create()
    {
        return view('pages.gallery.create');
    }

}
