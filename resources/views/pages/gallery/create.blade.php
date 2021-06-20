<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data galeri') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data galeri')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">{{__('Buat data galeri')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-gallery action="create" />
    </div>
</x-app-layout>
