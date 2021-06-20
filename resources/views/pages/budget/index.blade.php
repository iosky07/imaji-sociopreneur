<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Keuangan') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Data Keuangan')}}</a></div>
            {{--            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">{{__('Buat Campaign Baru')}}</a></div>--}}
        </div>
    </x-slot>

    <div class="container bg-white">
        <div class="p-4">
            <h4>Saldo Perusahaan : Rp. {{number_format($total,2)}}</h4>
            <div class="row">

                <div class="col-md-6">
                    <h6>
                        Bulan kemarin
                        <br>
                        Jumlah pemasukan : Rp. {{number_format($lastIncome[0]->income,2)}}
                        <br>
                        Jumlah pengeluaran : Rp. {{number_format($lastOutcome[0]->outcome,2)}}
                    </h6>
                    {{--                <a href="{{route('admin.budget.last')}}" class="btn btn-primary">Export data bulan kemarin</a>--}}
                </div>
                <div class="col-md-6">
                    <h6>
                        Bulan ini
                        <br>
                        Jumlah pemasukan : Rp. {{number_format($income[0]->income,2)}}
                        <br>
                        Jumlah pengeluaran : Rp. {{number_format($outcome[0]->outcome,2)}}
                    </h6>
                    {{--                <a href="{{route('admin.budget.now')}}" class="btn btn-primary">Export data bulan ini</a>--}}
                </div>
            </div>
        </div>
        <div>
            <livewire:table.main name="budget" :model="$budget"/>
        </div>
    </div>
</x-app-layout>
