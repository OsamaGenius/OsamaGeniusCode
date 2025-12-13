<x-layouts.app>

    <x-slot:title>{{ __('Create OsamaGenius account for free') }}</x-slot:title>

    <x-alerts.session></x-alerts.session>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-lg-3 g-3">
            
            <div class="col-12 col-md-2 col-lg-3"></div>

            <div class="col-12 col-md-8 col-lg-6">
                @livewire('auth.public.register')
            </div>
            
            <div class="col-12 col-md-2 col-lg-2"></div>

        </div>

    </div>

</x-layouts.app>