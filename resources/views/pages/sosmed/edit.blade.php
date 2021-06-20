<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data sosmed') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data sosmed')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.sosmed.index') }}">{{__('Ubah data sosmed')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-sosmed action="update" :sosmedId="$id"/>
    </div>
</x-app-layout>
