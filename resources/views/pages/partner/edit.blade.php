<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data partner') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data partner')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.partner.index') }}">{{__('Ubah data partner')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-partner action="update" partnerId="1"/>
    </div>
</x-app-layout>
