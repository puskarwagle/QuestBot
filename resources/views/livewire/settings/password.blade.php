<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
        <form wire:submit.prevent="updatePassword" class="mt-6 space-y-6">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-6 space-y-4">
                <legend class="fieldset-legend text-lg font-semibold">{{ __('Update Password') }}</legend>

                <!-- Current Password -->
                <div>
                    <label class="label" for="current_password">{{ __('Current password') }}</label>
                    <input wire:model="current_password" id="current_password" type="password" required autocomplete="current-password" class="input input-bordered w-full" placeholder="{{ __('Enter current password') }}" />
                </div>

                <!-- New Password -->
                <div>
                    <label class="label" for="password">{{ __('New password') }}</label>
                    <input wire:model="password" id="password" type="password" required autocomplete="new-password" class="input input-bordered w-full" placeholder="{{ __('Enter new password') }}" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="label" for="password_confirmation">{{ __('Confirm password') }}</label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" required autocomplete="new-password" class="input input-bordered w-full" placeholder="{{ __('Confirm new password') }}" />
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="btn btn-primary w-full md:w-auto">
                        {{ __('Save') }}
                    </button>

                    <x-action-message class="text-success font-medium" on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </fieldset>
        </form>

    </x-settings.layout>
</section>
