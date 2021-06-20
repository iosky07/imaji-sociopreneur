<div>
    <x-data-table :data="$data" :model="$campaigns">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title_id')" role="button" href="#">
                        Judul Berbahsa Indonesia
                        @include('components.sort-icon', ['field' => 'title_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title_en')" role="button" href="#">
                        Judul Berbahsa Inggris
                        @include('components.sort-icon', ['field' => 'title_en'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('type_campaign_id')" role="button" href="#">
                        Jenis
                        @include('components.sort-icon', ['field' => 'type_campaign_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                        Tanggal Diperbarui
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($campaigns as $campaign)
                <tr x-data="window.__controller.dataTableController({{ $campaign->id }})">
                    <td>{{ $campaign->id }}</td>
                    <td>{{ $campaign->title_id }}</td>
                    <td>{{ $campaign->title_en }}</td>
                    <td>{{ $campaign->typeCampaign->title }}</td>
{{--                    <td>{{ ($campaign->status==0)?'Menunggu':(($campaign->status==1)?'Diterima':'Ditolak') }}</td>--}}
                    <td>{{ $campaign->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="campaign/edit/{{ $campaign->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
