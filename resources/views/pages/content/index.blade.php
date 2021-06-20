<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data content') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data content')}}</a></div>
{{--            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">{{__('Buat Content Baru')}}</a></div>--}}
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="content" :model="$content"/>
    </div>
</x-app-layout>
