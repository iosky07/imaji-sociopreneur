<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class FormTag extends Component
{
    public $action;
    public $tag;
    public $tagId;
    public function mount(){
        if (auth()->user()->role == 1 or auth()->user()->role == 2 or auth()->user()->role == 3) {

        }else{
            abort(403);
        }
        $this->tag['title']='';
        if ($this->tagId!=null){
            $tag=Tag::findOrFail($this->tagId);
            $this->tag['title']=$tag->title;
        }
    }

    public function rules(){
        return [
            'tag.title'=>'required'
        ];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Tag::create($this->tag);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.tag.index'));
    }

    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Tag::find($this->tagId)->update($this->tag);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.tag.index'));
    }

    public function render()
    {
        return view('livewire.form-tag');
    }
}
