<x-layouts.panel>

    <x-slot:title>{{ __('Manage Site Info') }}</x-slot:title>

    <x-alerts.session></x-alerts.session>

    <div class="container py-5">

        @livewire('panel.about.about')

        <hr class="my-4">

    </div>

</x-layouts.panel>
