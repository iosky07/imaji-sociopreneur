<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data SPJ') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data SPJ')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.spj.index') }}">{{__('Buat data SPJ')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-finance action="create" :typeFinance="2"/>
    </div>
</x-app-layout>
