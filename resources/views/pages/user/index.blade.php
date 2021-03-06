<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data user') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">{{ __('Data user') }}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user" :model="$user"/>
    </div>
</x-app-layout>
