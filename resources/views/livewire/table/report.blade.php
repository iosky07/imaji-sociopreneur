<div>
    <x-data-table :data="$data" :model="$reports">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Title
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>
                @if(Auth::user()->role==1)
                    <th>
                        <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                            Author
                            @include('components.sort-icon', ['field' => 'author'])
                        </a>
                    </th>
                @endif
                <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                        Tanggal Diperbarui
                        @include('components.sort-icon', ['field' => 'updated_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($reports as $report)
                <tr x-data="window.__controller.dataTableController({{ $report->id }})">
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->title }}</td>
                    @if(Auth::user()->role==1)
                        <td>{{ $report->user->name }}</td>
                    @endif
                    <td>{{ $report->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.report.edit',$report->id) }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
