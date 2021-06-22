<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('User') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data user baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}"/>
                <small>Nama Lengkap Akun</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                             wire:model.defer="user.name"/>
                <x-jet-input-error for="user.name" class="mt-2"/>
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none"
                             wire:model.defer="user.email"/>
                <x-jet-input-error for="user.email" class="mt-2"/>
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="role" value="{{ __('Role') }}"/>
                <select name="role" id="role" wire:model.defer="user.role" class="form-control">
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Asistan</option>
                    <option value="4">Guest</option>
                </select>
                <x-jet-input-error for="user.role" class="mt-2"/>
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none"
                             wire:model.defer="user.email"/>
                <x-jet-input-error for="user.email" class="mt-2"/>
            </div>

            @if ($action == "createUser")
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password" value="{{ __('Password') }}"/>
                    <small>Minimal 8 karakter</small>
                    <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.password"/>
                    <x-jet-input-error for="user.password" class="mt-2"/>
                </div>

                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}"/>
                    <small>Minimal 8 karakter</small>
                    <x-jet-input id="password_confirmation" type="password"
                                 class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.password_confirmation"/>
                    <x-jet-input-error for="user.password_confirmation" class="mt-2"/>
                </div>
            @endif
            @if(auth()->user()->role==1)
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="employee_id" value="{{ __('Employee ID') }}"/>
                    <x-jet-input id="employee_id" type="text" class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.employee_id"/>
                    <x-jet-input-error for="user.employee_id" class="mt-2"/>
                </div>
            @endif
            @if($action=="updateUser")
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="place_of_birth" value="{{ __('place of birth') }}"/>
                    <x-jet-input id="place_of_birth" type="text" class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.place_of_birth"/>
                    <x-jet-input-error for="user.place_of_birth" class="mt-2"/>
                </div>

                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="date_of_birth" value="{{ __('date of birth') }}"/>
                    <x-jet-input id="date_of_birth" type="text" class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.date_of_birth"/>
                    <x-jet-input-error for="user.date_of_birth" class="mt-2"/>
                </div>

                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="no_rek" value="{{ __('No Rekening') }}"/>
                    <x-jet-input id="no_rek" type="text" class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.no_rek"/>
                    <x-jet-input-error for="user.no_rek" class="mt-2"/>
                </div>
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="name_bank" value="{{ __('Bank Name') }}"/>
                    <x-jet-input id="name_bank" type="text" class="mt-1 block w-full form-control shadow-none"
                                 wire:model.defer="user.name_bank"/>
                    <x-jet-input-error for="user.name_bank" class="mt-2"/>
                </div>
            @endif

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name_bank" value="{{ __('Quotes') }}"/>
            <textarea wire:model.defer="user.quotes" class="mt-1 block w-full form-control shadow-none"></textarea/>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])"/>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
