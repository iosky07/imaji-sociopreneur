<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data tag') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data tag')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">{{__('Ubah Data tag')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-tag action="update" contentId="1"/>
    </div>
</x-app-layout>
