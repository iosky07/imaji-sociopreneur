<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\ContentTag;
use App\Models\Status;
use App\Models\Tag;
use App\Models\TypeContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;


class FormContent extends Component
{

    use WithFileUploads;

    public $action;
    public $contentId;
    public $content;
    public $thumbnail;
    public $contentTags;
    public $optionTags;
    public $optionTypes;
    public $optionStatus;

    public function mount()
    {
        $this->content['user_id'] = auth()->id();
        $this->content['status_id'] = '1';
        $this->content['type_content_id'] = '1';
        $this->content['title_id'] = '';
        $this->content['title_en'] = '';
        $this->content['content_id'] = '';
        $this->content['content_en'] = '';
        $this->content['date_event'] = '';
        $this->content['note'] = '';
        $this->content['created_at'] = '';
        $this->contentTags = [];
        $this->optionTags = eloquent_to_options(Tag::get(), 'id', 'title');
        $this->optionTypes = eloquent_to_options(TypeContent::get(), 'id', 'title');
        $this->optionStatus = eloquent_to_options(Status::get(), 'id', 'title');

        if ($this->contentId != '') {
            $m = Content::findOrFail($this->contentId);
            if ($m->user_id != auth()->id()) {
                if (auth()->user()->role == 1 or auth()->user()->role == 2 or auth()->user()->role == 3) {
                    
                }else{
                abort(403);
                }
            }
            $this->contentTags=ContentTag::whereContentId($this->contentId)->pluck('tag_id')->toArray();
            $this->content = [
                'user_id' => auth()->id(),
                'status_id' => $m->status_id,
                'type_content_id' => $m->type_content_id,
                'title_id' => $m->title_id,
                'title_en' => $m->title_en,
                'content_id' => $m->content_id,
                'content_en' => $m->content_en,
                'date_event' => $m->date_event,
                'note' => $m->note,
                'created_at' => $m->created_at,
                'thumbnail' => $m->thumbnail,
            ];
        }
    }

    protected function rules()
    {
        if ($this->action=='create') {
            return [
                'content.status_id' => 'required',
                'content.type_content_id' => 'required',
                'content.title_id' => 'required',
                'content.title_en' => 'required',
                'content.content_id' => 'required',
                'content.content_en' => 'required',
                'content.created_at' => 'required',
                'thumbnail'=>'required|image'
            ];
        }
        else {
            return [
                'content.status_id' => 'required',
                'content.type_content_id' => 'required',
                'content.title_id' => 'required',
                'content.title_en' => 'required',
                'content.content_id' => 'required',
                'content.content_en' => 'required',
                'content.created_at' => 'required',
            ];
        }
    }

    public function render()
    {
        return view('livewire.form-content');
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->content['slug_id'] = Str::slug($this->content['title_id']);
        $this->content['slug_en'] = Str::slug($this->content['title_en']);

        $image = $this->thumbnail;
        $filename = Str::slug($this->content['title_id']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        $this->content['thumbnail'] = 'contents/' . $filename;
            //$image->save(public_path($this->content['thumbnail']));
            Storage::disk('local')->put('public/contents/' . $filename, $image, 'public');
            //$this->content['thumbnail'] = 'contents/' . $filename;
        $content=Content::create($this->content);
        foreach ($this->contentTags as $tag) {
            $this->contentTags['content_id'] = $content->id;
            $this->contentTags['tag_id'] = $tag;
            ContentTag::create($this->contentTags);
        }

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.content.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->content['slug_id'] = Str::slug($this->content['title_id']);
        $this->content['slug_en'] = Str::slug($this->content['title_en']);
        if ($this->thumbnail!=null) {
            Storage::disk('local')->delete('public/' . $this->content['thumbnail']);
            $image = $this->thumbnail;
            $filename = Str::slug($this->content['title_id']) . '-' . auth()->user()->name . '-' . rand(0, 1000) . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();
            $this->content['thumbnail'] = 'contents/' . $filename;
            $image->save(public_path($this->content['thumbnail']));
            //Storage::disk('local')->put('public/contents/' . $filename, file_get_contents($image), 'public');
            //$this->content['thumbnail'] = 'contents/' . $filename;

        }

        $content=Content::find($this->contentId)->update($this->content);
        ContentTag::whereContentId($this->contentId)->delete();

        foreach ($this->contentTags as $tag) {
            $this->contentTags['content_id'] = $this->contentId;
            $this->contentTags['tag_id'] = $tag;
            ContentTag::create($this->contentTags);
        }

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.content.index'));
    }

}
