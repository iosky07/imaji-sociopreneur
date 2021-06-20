<div>
    <x-data-table :data="$data" :model="$partners">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Title
                        @include('components.sort-icon', ['field' => 'name'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('size_logo_id')" role="button" href="#">
                        Size
                        @include('components.sort-icon', ['field' => 'size_logo_id'])
                    </a></th>
                <th><a href="#">
                        Logo
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($partners as $partner)
                <tr x-data="window.__controller.dataTableController({{ $partner->id }})">
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->title }}</td>
                    <td>{{ $partner->sizeLogo->title }}</td>
                    <td><img src="{{asset('storage/'.$partner->thumbnail)}}" style="max-height: 100px" alt=""></td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="partner/edit/{{ $partner->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
