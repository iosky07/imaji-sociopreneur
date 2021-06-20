<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data galeri') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data galeri')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="gallery" :model="$gallery"/>
    </div>
</x-app-layout>
