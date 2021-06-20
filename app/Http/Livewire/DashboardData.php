<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Content;
use App\Models\Finance;
use App\Models\Rab;
use App\Models\Report;
use App\Models\Spj;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardData extends Component
{
    public $data;
//    public $datas;

    public function mount()
    {
//        $this->data['blog'] = DB::select(DB::raw('SELECT count(*) as count FROM `contents` WHERE status_id=1'))[0]->count;
//        $this->data['rab'] = DB::select(DB::raw('SELECT count(*) as count FROM `finances` WHERE status_id=1 and type_finance_id=1'))[0]->count;
//        $this->data['spj'] = DB::select(DB::raw('SELECT count(*) as count FROM `finances` WHERE status_id=1 and type_finance_id=2'))[0]->count;
//        $this->data['report'] = DB::select(DB::raw('SELECT count(*) as count FROM `reports`'))[0]->count;
        $this->data['blogs']=Content::whereStatusId(1)->select('id','title_id','status_id','created_at','user_id')->with('user')->get();
        $this->data['rabs']=Finance::whereStatusId(1)->whereTypeFinanceId(1)->get();
        $this->data['spjs']=Finance::whereStatusId(1)->whereTypeFinanceId(2)->get();
        $this->data['reports']=Report::limit(6)->get();
    }
    public function render()
    {
        return view('livewire.dashboard-data');
    }
}
