<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Rab;
use App\Models\Report;
use App\Models\Spj;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $money;
    public $outcome;
    public $status;
    public $blogs;
    public $data;
//    public $datas;

    public function mount()
    {
        $this->data['blog'] = DB::select(DB::raw('SELECT count(*) as count FROM `contents` WHERE status_id=2'))[0]->count;
        $this->data['rab'] = DB::select(DB::raw('SELECT count(*) as count FROM `finances` WHERE status_id=2 and type_finance_id=1'))[0]->count;
        $this->data['spj'] = DB::select(DB::raw('SELECT count(*) as count FROM `finances` WHERE status_id=2 and type_finance_id=2'))[0]->count;
        $this->data['report'] = DB::select(DB::raw('SELECT count(*) as count FROM `reports`'))[0]->count;
//        $this->data['blogs']=Blog::limit(6)->whereStatus(0)->select('id','title','status','created_at','user_id')->with('user')->get();
//        $this->data['rabs']=Rab::limit(6)->whereStatus(0)->get();
//        $this->data['spjs']=Spj::limit(6)->whereStatus(0)->get();
//        $this->data['reports']=Report::limit(6)->get();
    }

    public function setStatus()
    {
        if ($this->status == "Pengeluaran") {
            $this->outcome = DB::select(DB::raw('SELECT month(created_at) as bulan , SUM(money) as money FROM `budgets` WHERE type_budget_id=1 GROUP BY YEAR(created_at), MONTH(created_at)'));
//            dd($this->outcome);
            $this->money['day'] = DB::select(DB::raw('SELECT DATE(created_at) as a, SUM(money) as money,YEAR(created_at) as c FROM `budgets` WHERE type_budget_id=1 GROUP BY YEAR(created_at), DATE(created_at) HAVING a=DATE(now()) and c=YEAR(NOW());'));
            $this->money['week'] = DB::select(DB::raw('SELECT week(created_at) as week, SUM(money) as money,YEAR(created_at) as years FROM `budgets` WHERE type_budget_id=1 GROUP BY YEAR(created_at), week(created_at) HAVING week=week(now()) and years=YEAR(NOW());'));
            $this->money['month'] = DB::select(DB::raw('SELECT MONTH(created_at) as months, SUM(money) as money,YEAR(created_at) as years FROM `budgets` WHERE type_budget_id=1 GROUP BY YEAR(created_at), MONTH(created_at) HAVING months=MONTH(now()) and years=YEAR(NOW());'));
            $this->money['year'] = DB::select(DB::raw('SELECT SUM(money) as money,YEAR(created_at) as c FROM `budgets` WHERE type_budget_id=1 GROUP BY YEAR(created_at) HAVING c=YEAR(NOW());'));
        } else {
            $this->outcome = DB::select(DB::raw('SELECT month(created_at) as bulan , SUM(money) as money FROM `budgets` WHERE type_budget_id=2 GROUP BY YEAR(created_at), MONTH(created_at)'));
            $this->money['day'] = DB::select(DB::raw('SELECT DATE(created_at) as a, SUM(money) as money,YEAR(created_at) as c FROM `budgets` WHERE type_budget_id=2 GROUP BY YEAR(created_at), DATE(created_at) HAVING a=DATE(now()) and c=YEAR(NOW());'));
            $this->money['week'] = DB::select(DB::raw('SELECT week(created_at) as week, SUM(money) as money,YEAR(created_at) as years FROM `budgets` WHERE type_budget_id=2 GROUP BY YEAR(created_at), week(created_at) HAVING week=week(now()) and years=YEAR(NOW());'));
            $this->money['month'] = DB::select(DB::raw('SELECT MONTH(created_at) as months, SUM(money) as money,YEAR(created_at) as years FROM `budgets` WHERE type_budget_id=2 GROUP BY YEAR(created_at), MONTH(created_at) HAVING months=MONTH(now()) and years=YEAR(NOW());'));
            $this->money['year'] = DB::select(DB::raw('SELECT SUM(money) as money,YEAR(created_at) as c FROM `budgets` WHERE type_budget_id=2 GROUP BY YEAR(created_at) HAVING c=YEAR(NOW());'));
        }
        $this->emit('fresh');
//        dd($this->data);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function outcomes()
    {
        $this->status = "Pengeluaran";
        $this->setStatus();
    }

    public function incomes()
    {
        $this->status = "Pemasukan";
        $this->setStatus();
    }
}
