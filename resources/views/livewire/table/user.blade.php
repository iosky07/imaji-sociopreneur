<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('employee_id')" role="button" href="#">
                        employee_id
                    @include('components.sort-icon', ['field' => 'employee_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('no_ktp')" role="button" href="#">
                    No KTP
                    @include('components.sort-icon', ['field' => 'no_ktp'])
                </a></th>
                <th><a wire:click.prevent="sortBy('no_rek')" role="button" href="#">
                    No Rekening
                    @include('components.sort-icon', ['field' => 'no_rek'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name_bank')" role="button" href="#">
                        Bank Name
                        @include('components.sort-icon', ['field' => 'name_bank'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td>{{ $user->employee_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->no_ktp }}</td>
                    <td>{{ $user->no_rek }}</td>
                    <td>{{ $user->name_bank }}</td>
{{--                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>--}}
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.user.edit',$user->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
