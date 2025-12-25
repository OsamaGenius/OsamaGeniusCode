<x-layouts.panel>

    <x-slot:title>{{ __('Manage Site Info') }}</x-slot:title>

    <x-alerts.session></x-alerts.session>

    <div class="container py-5">

        @livewire('panel.about.about', key('10'))

        <hr class="my-4">

        @livewire('panel.about.story', key('100'))

    </div>

</x-layouts.panel>
