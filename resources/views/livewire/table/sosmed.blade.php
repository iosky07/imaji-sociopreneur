<div>
    <x-data-table :data="$data" :model="$sosmeds">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Judul postingan
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>


                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($sosmeds as $sosmed)
                <tr x-data="window.__controller.dataTableController({{ $sosmed->id }})">
                    <td>{{ $sosmed->id }}</td>
                    <td>{{ $sosmed->title }}</td>
                    <td>
                       
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
