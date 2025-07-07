<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading=" __('Update the appearance settings for your account')">
        <div class="form-control w-full">
            <div class="btn-group flex justify-evenly flex-wrap gap-2">
                <input type="radio" name="theme" value="light" data-theme="light" class="btn btn-primary theme-controller" aria-label="{{ __('Light') }}" />
                <input type="radio" name="theme" value="dark" data-theme="dark" class="btn btn-primary theme-controller" aria-label="{{ __('Dark') }}" />
                <input type="radio" name="theme" value="cupcake" data-theme="cupcake" class="btn btn-primary theme-controller" aria-label="{{ __('Cupcake') }}" />
                <input type="radio" name="theme" value="bumblebee" data-theme="bumblebee" class="btn btn-primary theme-controller" aria-label="{{ __('Bumblebee') }}" />
                <input type="radio" name="theme" value="emerald" data-theme="emerald" class="btn btn-primary theme-controller" aria-label="{{ __('Emerald') }}" />
                <input type="radio" name="theme" value="corporate" data-theme="corporate" class="btn btn-primary theme-controller" aria-label="{{ __('Corporate') }}" />
                <input type="radio" name="theme" value="synthwave" data-theme="synthwave" class="btn btn-primary theme-controller" aria-label="{{ __('Synthwave') }}" />
                <input type="radio" name="theme" value="retro" data-theme="retro" class="btn btn-primary theme-controller" aria-label="{{ __('Retro') }}" />
                <input type="radio" name="theme" value="wireframe" data-theme="wireframe" class="btn btn-primary theme-controller" aria-label="{{ __('Wireframe') }}" />
            </div>
        </div>

    </x-settings.layout>
</section>
