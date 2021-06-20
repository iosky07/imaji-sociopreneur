<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.index', [
            'user' => User::class
        ]);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit($id)
    {
        return view('pages.user.edit', compact('id'));
    }
}
