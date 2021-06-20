<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('data team') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data team')}}</a></div>
            {{--            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">{{__('Buat Team Baru')}}</a></div>--}}
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="team" :model="$team"/>
    </div>
</x-app-layout>
