<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="file" title="Masukkan thumbnail" model="thumbnail" accept="image/*"/>
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
                <img src="{{asset('storage/'.$this->content['thumbnail'])}}" alt="" style="max-height: 300px">
            @endif
        @endif

        {{--        <x-daterange title="sa" model="content.timeaaa" />--}}
        {{--        <x-summernote title="contents" model="content.contents"/>--}}
        {{--        <x-select2 :options="$optionTags" :selected="$contentTags" title="Yoski" model="contentTags"/>--}}
        {{--        <x-select :options="$optionStatus" :selected="$content['status']" title="Yoski" model="content.status"/>--}}
        {{--        <x-select2 title="Tag tulisan" model="content.content" :option/>--}}
        {{--        <x-input type="text" title="title" model="content.title"/>--}}
        {{--        <x-date type="text" title="title" model="content.title" type="datetimepicker"/>--}}

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
