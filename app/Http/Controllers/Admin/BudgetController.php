<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{

    public function index()
    {
        $lastIncome = DB::select(DB::raw('SELECT sum(money) as income FROM budgets WHERE type_budget_id = 2 and  MONTH(created_at)= MONTH(CURRENT_DATE - INTERVAL 1 MONTH)'));
        $lastOutcome = DB::select(DB::raw('SELECT sum(money) as outcome FROM budgets WHERE type_budget_id = 1 and  MONTH(created_at)= MONTH(CURRENT_DATE - INTERVAL 1 MONTH)'));
        $income = DB::select(DB::raw('SELECT sum(money) as income FROM budgets WHERE type_budget_id=2 and MONTH(created_at)= MONTH(CURRENT_DATE)'));
        $outcome = DB::select(DB::raw('SELECT sum(money) as outcome FROM budgets WHERE type_budget_id=1 and MONTH(created_at)= MONTH(CURRENT_DATE)'));
        $in = DB::select(DB::raw('SELECT sum(money) as income FROM budgets WHERE type_budget_id=2 '));
        $out = DB::select(DB::raw('SELECT sum(money) as outcome FROM budgets WHERE type_budget_id=1'));
        $total=$in[0]->income-$out[0]->outcome;
        return view('pages.budget.index', [
            'budget' => Budget::class,
            'income' => $income, 'lastIncome' => $lastIncome, 'lastOutcome' => $lastOutcome, 'outcome' => $outcome,'total'=>$total
        ]);
    }

    public function download($id)
    {
        return response()->download(storage_path("app/public/budget/". Budget::findOrFail($id)->file));
        // return response()->download(storage_path("app/public/{$filename}"));
        // return response()->download(storage_path("app/public/". Budget::findOrFail($id)->file));
    }

    public function create()
    {
        return view('pages.budget.create');
    }


    public function edit($id)
    {
        return view('pages.budget.edit',compact('id'));
    }
}
