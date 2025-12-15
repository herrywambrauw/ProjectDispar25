<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informasi Profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label class="text-white" for="photo" value="{{ __('Photo') }}" />

                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full size-20 object-cover">
                </div>

                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="username" value="{{ __('Username') }}" />
            <x-input id="username" type="text" class="mt-1 block w-full" wire:model="state.username" />
            <x-input-error for="username" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="nik" value="{{ __('NIK') }}" />
            <x-input id="nik" type="text" class="mt-1 block w-full" wire:model="state.nik" maxlength="16" />
            <x-input-error for="nik" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="no_hp" value="{{ __('Nomor Handphone') }}" />
            <x-input id="no_hp" type="text" class="mt-1 block w-full" wire:model="state.no_hp" />
            <x-input-error for="no_hp" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="jenis_kelamin" value="{{ __('Jenis Kelamin') }}" />
            <select id="jenis_kelamin" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="state.jenis_kelamin">
                <option value="">{{ __('Pilih Jenis Kelamin') }}</option>
                <option value="L">{{ __('Laki-laki') }}</option>
                <option value="P">{{ __('Perempuan') }}</option>
            </select>
            <x-input-error for="jenis_kelamin" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="tempat_lahir" value="{{ __('Tempat Lahir') }}" />
            <x-input id="tempat_lahir" type="text" class="mt-1 block w-full" wire:model="state.tempat_lahir" />
            <x-input-error for="tempat_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
            <x-input id="tanggal_lahir" type="date" class="mt-1 block w-full" wire:model="state.tanggal_lahir" />
            <x-input-error for="tanggal_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label class="text-white" for="alamat" value="{{ __('Alamat Lengkap') }}" />
            <textarea id="alamat" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="3" wire:model="state.alamat"></textarea>
            <x-input-error for="alamat" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
