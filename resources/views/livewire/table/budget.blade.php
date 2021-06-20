<div>
    <x-data-table :data="$data" :model="$budgets">
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
                <th><a wire:click.prevent="sortBy('status_transaction')" role="button" href="#">
                        Transaksi
                        @include('components.sort-icon', ['field' => 'status_transaction'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('money')" role="button" href="#">
                        Jumlah Diajukan
                        @include('components.sort-icon', ['field' => 'money'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('pic_internal')" role="button" href="#">
                        Pic Internal
                        @include('components.sort-icon', ['field' => 'pic_internal'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('pic_external')" role="button" href="#">
                        Pic External
                        @include('components.sort-icon', ['field' => 'pic_external'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Waktu Transaksi
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
{{--                <th><a wire:click.prevent="sortBy('type')" role="button" href="#">--}}
{{--                        Jenis--}}
{{--                        @include('components.sort-icon', ['field' => 'type'])--}}
{{--                    </a></th>--}}
{{--                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">--}}
{{--                        Status--}}
{{--                        @include('components.sort-icon', ['field' => 'status'])--}}
{{--                    </a></th>--}}

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($budgets as $index=>$budget)

                <tr x-data="window.__controller.dataTableController({{ $budget->id }})" class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $budget->title }}</td>
                    <td>{{ $budget->typeBudget->title }}</td>
                    <td>{{"Rp.". number_format($budget->money,2) }}</td>
                    <td>{{ $budget->pic_internal }}</td>
                    <td>{{ $budget->pic_external }}</td>
                    <td>{{ $budget->created_at }}</td>

                    <td class="whitespace-no-wrap row-action--icon">
                        @if($budget->file!=null)
                            <a role="button" class="mr-3" href="{{route('admin.download',['budget',$budget->id])}}">
                                <i class="fa fa-16px fa-download"></i>
                            </a>
                        @endif
                        <a role="button" href="{{ route('admin.budget.edit',$budget->id) }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

