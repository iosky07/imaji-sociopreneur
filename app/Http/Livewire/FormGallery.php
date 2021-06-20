<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\ContentTag;
use App\Models\Gallery;
use App\Models\Status;
use App\Models\Tag;
use App\Models\TypeContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormGallery extends Component
{
    use WithFileUploads;

    public $action;
    public $thumbnail;

    protected function rules()
    {
        return [
            'thumbnail' => 'required|image'
        ];
    }

    public function render()
    {
        return view('livewire.form-gallery');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();

        $image = $this->thumbnail;
        $filename = Str::slug(auth()->user()->name) . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(640, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        Storage::disk('local')->put('public/gallery/' . $filename, $image, 'public');

        $gallery['thumbnail'] = 'gallery/' . $filename;
        Gallery::create($gallery);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.gallery.index'));
    }
}
