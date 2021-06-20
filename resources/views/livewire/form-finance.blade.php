<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul " model="finance.title"/>
        <x-input type="money" title="Jumlah uang pengajuan" model="finance.money"/>
        @if($typeFinance=="1")
            <x-select title="Jenis transaksi" :options="$optionTypes" :selected="$finance['type_submission_id']"
                      model="finance.type_submission_id"/>
        @endif
        @if(auth()->user()->role=='1')
            <x-select title="Status" model="finance.status_id" :options="$optionStatus" :selected="$finance['status_id']"/>
        @endif
        <x-date type="datetimepicker" title="Waktu transaksi" model="finance.created_at"/>

        <x-input type="file" title="Masukkan file" model="file"/>
        <div wire:loading wire:target="file">
            Proses upload
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

