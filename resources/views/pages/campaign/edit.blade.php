<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data penghargaan atau slider') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data penghargaan atau slider')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.campaign.index') }}">{{__('Buat Campaign Baru')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-campaign action="update" :campaignId="$id"/>
    </div>
</x-app-layout>
