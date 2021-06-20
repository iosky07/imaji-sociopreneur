<div>
    <x-data-table :data="$data" :model="$faqs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title_id')" role="button" href="#">
                        Judul berbahasa indonesia
                        @include('components.sort-icon', ['field' => 'title_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title_en')" role="button" href="#">
                        Judul berbahasa inggrispartner.blade.php
                        @include('components.sort-icon', ['field' => 'title_en'])
                    </a></th>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($faqs as $faq)
                <tr x-data="window.__controller.dataTableController({{ $faq->id }})">
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->title_id }}</td>
                    <td>{{ $faq->title_en }}</td>
                    <td>
                        <a role="button" href="faq/edit/{{ $faq->id }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
