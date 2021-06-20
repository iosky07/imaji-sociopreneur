<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul tulisan bahasa indonesia" model="campaign.title_id"/>
        <x-input type="text" title="Judul tulisan bahasa inggris" model="campaign.title_en"/>
        <x-input type="text" title="Link" model="campaign.slug"/>

        <x-select title="Status" model="campaign.type_campaign_id" :options="$optionTypes" :selected="$campaign['type_campaign_id']"/>

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
                <img src="{{asset('storage/'.$this->campaign['thumbnail'])}}" alt="" style="max-height: 300px">
            @endif
        @endif

        {{--        <x-daterange title="sa" model="campaign.timeaaa" />--}}
        {{--        <x-summernote title="campaigns" model="campaign.campaigns"/>--}}
        {{--        <x-select2 :options="$optionTags" :selected="$campaignTags" title="Yoski" model="campaignTags"/>--}}
        {{--        <x-select :options="$optionStatus" :selected="$campaign['status']" title="Yoski" model="campaign.status"/>--}}
        {{--        <x-select2 title="Tag tulisan" model="campaign.campaign" :option/>--}}
        {{--        <x-input type="text" title="title" model="campaign.title"/>--}}
        {{--        <x-date type="text" title="title" model="campaign.title" type="datetimepicker"/>--}}

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
