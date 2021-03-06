<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat data Faq') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data Faq')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">{{__('Buat data Faq')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-faq action="create" />
    </div>
</x-app-layout>
