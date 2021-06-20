<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SosmedController extends Controller
{

    public function index()
    {
        return view('pages.sosmed.index', [
            'sosmed' => Sosmed::class,
//            'income' => $income, 'lastIncome' => $lastIncome, 'lastOutcome' => $lastOutcome, 'outcome' => $outcome,'total'=>$total
        ]);
    }

//    public function download($id)
//    {
//        return response()->download(storage_path("app/public/budget/". Budget::findOrFail($id)->file));
//        // return response()->download(storage_path("app/public/{$filename}"));
//        // return response()->download(storage_path("app/public/". Budget::findOrFail($id)->file));
//    }

    public function create()
    {
        return view('pages.sosmed.create');
    }


    public function edit($id)
    {
        return view('pages.sosmed.edit',compact('id'));
    }
}
