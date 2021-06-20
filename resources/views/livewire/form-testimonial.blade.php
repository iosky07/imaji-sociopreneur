<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Nama tokoh" model="testimonial.name"/>
        <x-input type="text" title="Jabatan tokoh" model="testimonial.position"/>

        <x-textarea title="Kata tokoh bahasa indonesia" model="testimonial.content_id"/>
        <x-textarea title="Kata tokoh bahasa inggris" model="testimonial.content_en"/>

        <x-input type="file" title="Foto tokoh" model="thumbnail" accept="image/*"/>
        <div wire:loading wire:target="thumbnail">
            Proses upload
        </div>
        @if($action=='create')
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @endif
        @else
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @else
                <img src="{{asset('storage/'.$this->testimonial['thumbnail'])}}" alt="" style="max-height: 300px">
            @endif
        @endif

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
