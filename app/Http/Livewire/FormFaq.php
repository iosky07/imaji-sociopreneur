<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FormFaq extends Component
{
    public $action;
    public $faq;
    public $faqId;
    public function mount(){
        $this->faq['content_id']='';
        $this->faq['content_en']='';
        if (auth()->user()->role == 1 or auth()->user()->role == 2 or auth()->user()->role == 3) {

        }else{
            abort(403);
        }
        if ($this->faqId!=null){
            $faq=Faq::findOrFail($this->faqId);
            $this->faq['title_id']=$faq->title_id;
            $this->faq['title_en']=$faq->title_en;
            $this->faq['content_id']=$faq->content_id;
            $this->faq['content_en']=$faq->content_en;
        }
    }

    public function rules(){
        return [
            'faq.title_id'=>'required',
            'faq.title_en'=>'required',
            'faq.content_id'=>'required',
            'faq.content_en'=>'required',
        ];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Faq::create($this->faq);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.faq.index'));
    }

    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Faq::find($this->faqId)->update($this->faq);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.faq.index'));
    }
    public function render()
    {
        return view('livewire.form-faq');
    }
}
