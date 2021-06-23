<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\Status;
use App\Models\TypeFinance;
use App\Models\TypeSubmission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormFinance extends Component
{
    use WithFileUploads;

    public $action;
    public $financeId;
    public $finance;
    public $file;
    public $optionTypes;
    public $typeFinance;
    public $optionStatus;
public $f;
    public function mount()
    {
        $this->finance = [
            'user_id'=>auth()->id(),
            'type_finance_id'=>$this->typeFinance,
            'status_id'=>1,
            'title' => '',
            'money' => 0,
            'file' => '',
            'created_at' => '',
        ];
        if ($this->typeFinance=="1"){
            $this->finance['type_submission_id']=1;
            $this->f='rab';
        }else{
            $this->f='spj';
        }

        $this->optionTypes = eloquent_to_options(TypeSubmission::get(), 'id', 'title');
        $this->optionStatus = eloquent_to_options(Status::get(), 'id', 'title');
        if ($this->financeId != '') {
            $m = Finance::findOrFail($this->financeId);
            $this->finance = [
                'title' => $m->title,
                'money' => $m->money,
                'user_id'=>$m->user_id,
                'status_id'=>$m->status_id,
                'type_submission_id'=>$m->type_submission_id,
                'file' => $m->file,
                'created_at' => $m->created_at,
            ];
        }
    }

    public function render()
    {
        return view('livewire.form-finance');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        if ($this->file != null) {
            $image = $this->file;
            $filename = Str::slug($this->finance['title']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
//            $image = Image::make($image)->resize(640, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image->stream();
//            Storage::disk('local')->put('public/finance/' . $filename, $image, 'public');
            $this->file->store('finance');
            $this->finance['file'] = 'finance/' . $filename;
        }
        Finance::create($this->finance);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route("admin.$this->f.index"));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        if ($this->file != null) {
            Storage::disk('local')->delete('public/' . $this->finance['file']);
            $image = $this->file;
            $filename = Str::slug($this->finance['title']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
//            $image = Image::make($image)->resize(640, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image->stream();
            Storage::disk('local')->put('public/finance/' . $filename, file_get_contents($image), 'public');
            $this->finance['file'] = 'finance/' . $filename;

        }

        Finance::find($this->financeId)->update($this->finance);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route("admin.$this->f.index"));
    }

    protected function rules()
    {
        if ($this->action == 'create') {
            return [
                'finance.title' => 'required',
                'finance.money' => 'required',
            ];
        } else {
            return [
                'finance.title' => 'required',
                'finance.money' => 'required',
            ];
        }
    }

}
