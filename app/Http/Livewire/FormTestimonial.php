<?php

namespace App\Http\Livewire;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormTestimonial extends Component
{
    use WithFileUploads;

    public $action;
    public $testimonialId;
    public $testimonial;
    public $thumbnail;

    public function mount()
    {
        $this->testimonial['name'] = '';
        $this->testimonial['content_id'] = '';
        $this->testimonial['content_en'] = '';
        $this->testimonial['position'] = '';
        $this->testimonial['thumbnail'] = '';

        if ($this->testimonialId != '') {
            $m = Testimonial::findOrFail($this->testimonialId);
            $this->testimonial = [
                'name' => $m->name,
                'content_id' => $m->content_id,
                'content_en' => $m->content_en,
                'position' => $m->position,
                'thumbnail' => $m->thumbnail,
            ];
        }
    }

    public function render()
    {
        return view('livewire.form-testimonial');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $image = $this->thumbnail;
        $filename = Str::slug($this->testimonial['name']) . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(640, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        Storage::disk('local')->put('public/testimonial/' . $filename, file_get_contents($image), 'public');

        $this->testimonial['thumbnail'] = 'testimonial/' . $filename;
        Testimonial::create($this->testimonial);


        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.testimonial.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();

        if ($this->thumbnail != null) {
            Storage::disk('local')->delete('public/' . $this->testimonial['thumbnail']);
            $image = $this->thumbnail;
            $filename = Str::slug($this->testimonial['name']) . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();
            Storage::disk('local')->put('public/testimonial/' . $filename, file_get_contents($image), 'public');
            $this->testimonial['thumbnail'] = 'testimonial/' . $filename;
        }

        Testimonial::find($this->testimonialId)->update($this->testimonial);


        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.testimonial.index'));
    }

    protected function rules()
    {
        if ($this->action == 'create') {
            return [
                'testimonial.name' => 'required',
                'testimonial.content_id' => 'required',
                'testimonial.content_en' => 'required',
                'testimonial.position' => 'required',
                'thumbnail' => 'required|image'
            ];
        } else {
            return [
                'testimonial.name' => 'required',
                'testimonial.content_id' => 'required',
                'testimonial.content_en' => 'required',
                'testimonial.position' => 'required',
            ];
        }
    }

}
