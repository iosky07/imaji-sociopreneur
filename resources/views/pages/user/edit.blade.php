<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data user') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">{{ __('Data user') }}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('Ubah data user') }}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="updateUser" :userId="$id" />
    </div>
</x-app-layout>
