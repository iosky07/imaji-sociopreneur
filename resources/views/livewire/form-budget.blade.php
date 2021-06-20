<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-select title="Jenis" :options="$optionTypes" :selected="$budget['type_budget_id']" model="budget.type_budget_id"/>
        <x-input type="text" title="Judul pemasukan/pengeluaran" model="budget.title"/>
        <x-input type="money" title="Jumlah uang" model="budget.money"/>
        <x-input type="text" title="PIC Internal" model="budget.pic_internal"/>
        <x-input type="text" title="PIC Eksternal" model="budget.pic_external"/>
        <x-date type="datetimepicker" title="Waktu transaksi" model="budget.created_at"/>
        <x-textarea title="Catatan" model="budget.note"/>

        <x-input type="file" title="Masukkan file" model="file" />
        <div wire:loading wire:target="file">
            Proses upload
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

