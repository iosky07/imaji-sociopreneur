<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data RAB') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data RAB')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.rab.index') }}">{{__('Buat data RAB')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-finance action="create" :typeFinance="1"/>
    </div>
</x-app-layout>
