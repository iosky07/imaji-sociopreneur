<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\ContentTag;
use App\Models\Partner;
use App\Models\SizeLogo;
use App\Models\Status;
use App\Models\Tag;
use App\Models\TypeContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPartner extends Component
{
    use WithFileUploads;

    public $action;
    public $partnerId;
    public $partner;
    public $thumbnail;
    public $partnerTags;
    public $optionSize;

    public function mount()
    {
        $this->partner['title'] = '';
        $this->partner['size'] = '1';
        $this->partner['slug'] = null;
        $this->optionSize = eloquent_to_options(SizeLogo::get(), 'id', 'title');
        if ($this->partnerId != '') {
            $m = Partner::findOrFail($this->partnerId);
            $this->partner = [
                'title' => $m->title,
                'slug' => $m->slug,
                'size' => $m->size,
                'thumbnail' => $m->thumbnail,
            ];
        }
    }

    protected function rules()
    {
        if ($this->action == 'create') {
            return [
                'partner.title' => 'required',
                'partner.size' => 'required',
                'partner.slug' => 'url',
                'thumbnail' => 'required',
            ];
        } else {
            return [
                'partner.title' => 'required',
                'partner.size' => 'required',
                'partner.slug' => 'url',
            ];
        }
    }

    public function render()
    {
        return view('livewire.form-partner');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $image = $this->thumbnail;
        $filename = Str::slug($this->partner['title'] . '-' . auth()->user()->name) . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(640, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        Storage::disk('local')->put('public/partner/' . $filename, file_get_contents($image), 'public');

        $this->partner['thumbnail'] = 'partner/' . $filename;
        $partner = Partner::create($this->partner);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.partner.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        if ($this->thumbnail != null) {
            Storage::disk('local')->delete('public/' . $this->partner['thumbnail']);
            $image = $this->thumbnail;
            $filename = Str::slug($this->partner['title'] . '-' . auth()->user()->name). '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();
            Storage::disk('local')->put('public/partner/' . $filename, file_get_contents($image), 'public');
            $this->partner['thumbnail'] = 'partner/' . $filename;

        }

        $partner = Partner::find($this->partnerId)->update($this->partner);


        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.partner.index'));
    }
}
