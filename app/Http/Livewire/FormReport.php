<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;

class FormReport extends Component
{
    public $action;
    public $report;
    public $reportId;

    public function mount()
    {
        $this->report['user_id'] = auth()->id();
        $this->report['title'] = '';
        $this->report['content'] = '';
        if ($this->reportId != null) {
            $report = Report::findOrFail($this->reportId);
            if ($report->user_id != auth()->id() and $this->action == 'update') {
                abort(403);
            }
            $this->report['title'] = $report->title;
            $this->report['content'] = $report->content;
        }
    }

    public function rules()
    {
        return [
            'report.title' => 'required',
            'report.content' => 'required',
        ];
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        Report::create($this->report);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.report.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        Report::find($this->reportId)->update($this->report);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.report.index'));
    }

    public function render()
    {
        return view('livewire.form-report');
    }
}
