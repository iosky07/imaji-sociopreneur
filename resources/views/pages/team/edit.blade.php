<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data team') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data team')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">{{__('Ubah data team')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-team action="update" teamId="1"/>
    </div>
</x-app-layout>
