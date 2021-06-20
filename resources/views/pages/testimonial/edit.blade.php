<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data testimonial') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data testimonial')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">{{__('Ubah data testimonial')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-testimonial action="update" :testimonialId="$id"/>
    </div>
</x-app-layout>
