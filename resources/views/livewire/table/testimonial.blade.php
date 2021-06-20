<div>
    <x-data-table :data="$data" :model="$testimonials">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Nama
                        @include('components.sort-icon', ['field' => 'name'])
                    </a></th>
{{--                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">--}}
{{--                        Status--}}
{{--                        @include('components.sort-icon', ['field' => 'status'])--}}
{{--                    </a></th>--}}
                <th><a wire:click.prevent="sortBy('position')" role="button" href="#">
                        Posisi
                        @include('components.sort-icon', ['field' => 'position'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($testimonials as $testimonial)
                <tr x-data="window.__controller.dataTableController({{ $testimonial->id }})">
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->name }}</td>
{{--                    <td>{{ ($testimonial->status==0)?'Menunggu':(($testimonial->status==1)?'Diterima':'Ditolak') }}</td>--}}
                    <td>{{ $testimonial->position }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.testimonial.edit',$testimonial->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
