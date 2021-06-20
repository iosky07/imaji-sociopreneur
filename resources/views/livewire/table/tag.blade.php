<div>
    <x-data-table :data="$data" :model="$tags">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('tag')" role="button" href="#">
                        Title
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($tags as $tag)
                <tr x-data="window.__controller.dataTableController({{ $tag->id }})">
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>

                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="tag/edit/{{ $tag->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
