<?php

namespace App\Http\Livewire;

use App\Models\Sosmed;
use Livewire\Component;

class FormSosmed extends Component
{
    public $action;
    public $sosmed;
    public $sosmedId;
    public function mount(){
        $this->sosmed['title']='';
        $this->sosmed['slug']='';
        if (auth()->user()->role == 1 or auth()->user()->role == 2 or auth()->user()->role == 3) {

        }else{
            abort(403);
        }
        if ($this->sosmedId!=null){
            $sosmed=Sosmed::findOrFail($this->sosmedId);
            $this->sosmed['title']=$sosmed->title;
            $this->sosmed['slug']=$sosmed->slug;
        }
    }

    public function rules(){
        return [
            'sosmed.title'=>'required',
            'sosmed.slug'=>'required',
        ];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Sosmed::create($this->sosmed);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.sosmed.index'));
    }

    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Sosmed::find($this->sosmedId)->update($this->sosmed);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.sosmed.index'));
    }
    public function render()
    {
        return view('livewire.form-sosmed');
    }
}
