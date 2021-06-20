<div>
    <x-data-table :data="$data" :model="$gallerys">
        <x-slot name="head">
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a>
                </th>
                <th>Gallery</th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($gallerys as $gallery)
                <tr x-data="window.__controller.dataTableController({{ $gallery->id }})">
                    <td>{{ $gallery->id }}</td>
                    <td><img src="{{asset('storage/'.$gallery->image)}}" style="max-height: 100px" alt=""></td>
{{--                    <img src="{{ asset('storage/'.$this->user->profile_photo_path) }}"--}}

                    <td class="whitespace-no-wrap row-action--icon">
{{--                        <a role="button" href="gallery/edit/{{ $gallery->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>--}}
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
