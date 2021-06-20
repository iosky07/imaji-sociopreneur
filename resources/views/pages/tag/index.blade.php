<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data tag') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data tag')}}</a></div>
            {{--            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">{{__('Buat Tag Baru')}}</a></div>--}}
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="tag" :model="$tag"/>
    </div>
</x-app-layout>
