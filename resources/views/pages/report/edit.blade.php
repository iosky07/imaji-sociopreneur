<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data laporan') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data laporan')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.report.index') }}">{{__('Ubah data laporan')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-report action="update" contentId="1"/>
    </div>
</x-app-layout>
