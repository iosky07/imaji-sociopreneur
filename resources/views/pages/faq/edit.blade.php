<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data faq') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data faq')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">{{__('Ubah data faq')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-faq action="update" :faqId="$id"/>
    </div>
</x-app-layout>
