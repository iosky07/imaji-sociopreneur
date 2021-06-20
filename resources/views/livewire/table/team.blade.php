<div>
    <x-data-table :data="$data" :model="$teams">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        Nama Team
                        @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('order')" role="button" href="#">
                        Urutan
                        @include('components.sort-icon', ['field' => 'order'])
                    </a></th>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($teams as $team)
                <tr x-data="window.__controller.dataTableController({{ $team->id }})">
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->user->name }}</td>
                    <td>{{ $team->order }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.team.edit',$team->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

