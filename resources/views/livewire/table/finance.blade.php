<div>
    <x-data-table :data="$data" :model="$finances">
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
                <th><a wire:click.prevent="sortBy('money')" role="button" href="#">
                        Jumlah Diajukan
                        @include('components.sort-icon', ['field' => 'money'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                        Status
                        @include('components.sort-icon', ['field' => 'status'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Tanggal Diperbarui
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($finances as $index=>$finance)
                <tr x-data="window.__controller.dataTableController({{ $finance->id }})" class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $finance->title }}</td>
                    @if(Auth::user()->role==1)
                        <td>{{ $finance->user->name }}</td>
                    @endif
                    <td>{{"Rp.". number_format($finance->money,2) }}</td>
                    <td>{{ $finance->status->title }}</td>
                    <td>{{ $finance->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.'.$finance->typeFinance->title.'.edit',$finance->id) }}" class="mr-3">
                            <i class="fa fa-16px fa-pen"></i>
                        </a>
                        @if($finance->file!=null)
                        <a role="button" class="mr-3" href="{{route('admin.download',['finance',$finance->id])}}">
                            <i class="fa fa-16px fa-download"></i>
                        </a>
                        @endif
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
