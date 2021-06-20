<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul pertanyaan bahasa indonesia" model="faq.title_id"/>
        <x-input type="text" title="Judul pertanyaan bahasa inggris" model="faq.title_en"/>

        <x-summernote title="Jawaban pertanyaan bahasa indonesia" model="faq.content_id"/>
        <x-summernote title="Jawaban pertanyaan bahasa inggris" model="faq.content_en"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
