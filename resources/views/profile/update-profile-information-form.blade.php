<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-6">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
{{--        <div class="form-group col-span-6 sm:col-span-6">--}}
{{--            <label for="">No Ktp</label>--}}
{{--            <input id="email" type="text" class="mt-1 block w-full form-control shadow-none"--}}
{{--                   name="no_ktp" wire:model.defer="user.no_ktp"/>--}}
{{--        </div>--}}
        <div class="form-group col-span-6 sm:col-span-6">
            <x-jet-label for="no_ktp" value="{{ __('No KTP') }}"/>
            <x-jet-input id="no_ktp" type="text" class="mt-1 block w-full form-control shadow-none"
                         wire:model.defer="state.no_ktp"/>
            <x-jet-input-error for="state.no_ktp" class="mt-2"/>
        </div>
        <div class="form-group col-span-6 sm:col-span-6">
            <x-jet-label for="place_of_birth" value="{{ __('place of birth') }}"/>
            <x-jet-input id="place_of_birth" type="text" class="mt-1 block w-full form-control shadow-none"
                         wire:model.defer="state.place_of_birth"/>
            <x-jet-input-error for="state.place_of_birth" class="mt-2"/>
        </div>

        <div class="form-group col-span-6 sm:col-span-6">
            <x-jet-label for="date_of_birth" value="{{ __('date of birth') }}"/>
            <x-jet-input id="date_of_birth" type="text" class="mt-1 block w-full form-control shadow-none"
                         wire:model.defer="state.date_of_birth"/>
            <x-jet-input-error for="state.date_of_birth" class="mt-2"/>
        </div>

        <div class="form-group col-span-6 sm:col-span-6">
            <x-jet-label for="no_rek" value="{{ __('No Rekening') }}"/>
            <x-jet-input id="no_rek" type="text" class="mt-1 block w-full form-control shadow-none"
                         wire:model.defer="state.no_rek"/>
            <x-jet-input-error for="state.no_rek" class="mt-2"/>
        </div>
        <div class="form-group col-span-6 sm:col-span-6">
            <x-jet-label for="name_bank" value="{{ __('Bank Name') }}"/>
            <x-jet-input id="name_bank" type="text" class="mt-1 block w-full form-control shadow-none"
                         wire:model.defer="state.name_bank"/>
            <x-jet-input-error for="state.name_bank" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="email" value="{{ __('Quotes') }}" />
            <textarea name="quotes" id="quotes"  class="form-control" cols="30" rows="10" wire:model.defer="state.quotes"></textarea>

        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
