<?php

namespace App\Http\Livewire;

use App\Models\Campaign;

use App\Models\TypeCampaign;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormCampaign extends Component
{
    use WithFileUploads;

    public $action;
    public $campaignId;
    public $campaign;
    public $thumbnail;
    public $optionTypes;

    public function mount()
    {
        $this->campaign['type_campaign_id'] = '1';
        $this->campaign['title_id'] = '';
        $this->campaign['title_en'] = '';
        $this->campaign['slug'] = '';
        $this->optionTypes = eloquent_to_options(TypeCampaign::get(), 'id', 'title');
        if ($this->campaignId != '') {
            $m = Campaign::findOrFail($this->campaignId);
            $this->campaign = [
                'type_campaign_id' => $m->type_campaign_id,
                'title_id' => $m->title_id,
                'title_en' => $m->title_en,
                'slug' => $m->note,
                'thumbnail' => $m->thumbnail,
            ];
        }
    }

    protected function rules()
    {
        if ($this->action=='create') {
            return [
                'campaign.type_campaign_id' => 'required',
                'campaign.title_id' => 'required',
                'campaign.title_en' => 'required',
                'thumbnail'=>'required|image'
            ];
        }
        else {
            return [
                'campaign.type_campaign_id' => 'required',
                'campaign.title_id' => 'required',
                'campaign.title_en' => 'required',
            ];
        }
    }

    public function render()
    {
        return view('livewire.form-campaign');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();

        $image = $this->thumbnail;
        $filename = Str::slug($this->campaign['title_id']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(640, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        Storage::disk('local')->put('public/campaigns/' . $filename, file_get_contents($image), 'public');

        $this->campaign['thumbnail'] = 'campaigns/' . $filename;
        Campaign::create($this->campaign);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.campaign.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        if ($this->thumbnail!=null) {
            Storage::disk('local')->delete('public/' . $this->campaign['thumbnail']);
            $image = $this->thumbnail;
            $filename = Str::slug($this->campaign['title_id']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();
            Storage::disk('local')->put('public/campaigns/' . $filename, file_get_contents($image), 'public');
            $this->campaign['thumbnail'] = 'campaigns/' . $filename;

        }

        Campaign::find($this->campaignId)->update($this->campaign);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.campaign.index'));
    }
}
