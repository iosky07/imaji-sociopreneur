<?php

namespace App\Http\Livewire;

use App\Models\Budget;
use App\Models\TypeBudget;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormBudget extends Component
{
    use WithFileUploads;

    public $action;
    public $budgetId;
    public $budget;
    public $file;
    public $optionTypes;

    public function mount()
    {
        $this->budget = [
            'title' => '',
            'money' => 0,
            'type_budget_id' => 1,
            'pic_internal' => '',
            'pic_external' => '',
            'note' => '',
            'file' => '',
            'created_at' => '',
        ];

        $this->optionTypes = eloquent_to_options(TypeBudget::get(), 'id', 'title');

        if ($this->budgetId != '') {
            $m = Budget::findOrFail($this->budgetId);

            $this->budget = [
                'title' => $m->title,
                'money' => $m->money,
                'type_budget_id' => $m->type_budget_id,
                'pic_internal' => $m->pic_internal,
                'pic_external' => $m->pic_external,
                'note' => $m->note,
                'file' => $m->file,
                'created_at' => $m->created_at,
            ];
        }
    }

    public function render()
    {
        return view('livewire.form-budget');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        if ($this->file != null) {
            $image = $this->file;
            $filename = Str::slug($this->budget['title']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
//            $image = Image::make($image)->resize(640, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image->stream();
            Storage::disk('local')->put('public/budget/' . $filename, file_get_contents($image), 'public');
            $this->budget['file'] = 'budget/' . $filename;
        }
        Budget::create($this->budget);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.budget.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        if ($this->file != null) {
            Storage::disk('local')->delete('public/' . $this->budget['file']);
            $image = $this->file;
            $filename = Str::slug($this->budget['title']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
//            $image = Image::make($image)->resize(640, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image->stream();
            Storage::disk('local')->put('public/budget/' . $filename, file_get_contents($image), 'public');
            $this->budget['file'] = 'budget/' . $filename;

        }

        Budget::find($this->budgetId)->update($this->budget);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.budget.index'));
    }

    protected function rules()
    {
        if ($this->action == 'create') {
            return [
                'budget.title' => 'required',
                'budget.money' => 'required',
                'budget.type_budget_id' => 'required'
            ];
        } else {
            return [
                'budget.title' => 'required',
                'budget.money' => 'required',
                'budget.type_budget_id' => 'required',
            ];
        }
    }

}
