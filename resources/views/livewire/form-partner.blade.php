<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Nama partner" model="partner.title"/>
        <x-input type="text" title="Link web partner" model="partner.slug"/>
        <x-select title="Ukuran logo partner" :options="$optionSize" :selected="$partner['size']" model="partner.size"/>
        <x-input type="file" title="Masukkan logo" model="thumbnail" accept="image/*"/>
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
                <img src="{{asset('storage/'.$this->partner['thumbnail'])}}" alt="" style="max-height: 300px">
            @endif
        @endif
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
