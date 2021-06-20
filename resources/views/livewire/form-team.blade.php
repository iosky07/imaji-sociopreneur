<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-select title="Nama" model="team.user_id" :options="$optionUser" :selected="$team['user_id']"/>
        <x-input type="number" title="Urutan" model="team.order"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
