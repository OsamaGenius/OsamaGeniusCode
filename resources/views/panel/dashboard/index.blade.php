<x-layouts.panel>
    <x-slot:title>{{ __('Dashboard Statistics') }}</x-slot:title>

    <div class="container dashboard">

        {{-- Top Boxs --}}
        <div class="py-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-2">
                {{-- Users --}}
                <div class="col">
                    <a wire:navigate href="#" class="text-decoration-none">
                        <div class="card text-start position-relative dash-box shadow-md border-0 bg-white">
                            <i class="fas fa-user-group fa-3x position-absolute icon"></i>
                            <div class="card-body">
                                <h2 class="card-title">{{ $users }}</h2>
                                <h4 class="card-text">Users</h4>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Projects --}}
                <div class="col">
                    <a wire:navigate href="{{ route('panel.works') }}" class="text-decoration-none">
                        <div class="card text-start position-relative dash-box shadow-md border-0 bg-white">
                            <i class="fas fa-database fa-3x position-absolute icon"></i>
                            <div class="card-body">
                                <h2 class="card-title">{{ $projects }}</h2>
                                <h4 class="card-text">Projects</h4>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Skills --}}
                <div class="col">
                    <a wire:navigate href="{{ route('panel.skills') }}" class="text-decoration-none">
                        <div class="card text-start position-relative dash-box shadow-md border-0 bg-white">
                            <i class="fas fa-list fa-3x position-absolute icon"></i>
                            <div class="card-body">
                                <h2 class="card-title">{{ $skills }}</h2>
                                <h4 class="card-text">Skills</h4>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Socials Links --}}
                <div class="col">
                    <a wire:navigate href="{{ route('panel.socials') }}" class="text-decoration-none">
                        <div class="card text-start position-relative dash-box shadow-md border-0 bg-white">
                            <i class="fas fa-link fa-3x position-absolute icon"></i>
                            <div class="card-body">
                                <h2 class="card-title">{{ $socials }}</h2>
                                <h4 class="card-text">Links</h4>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Visitors --}}
                <div class="col">
                    <a wire:navigate href="#" class="text-decoration-none">
                        <div class="card text-start position-relative dash-box shadow-md border-0 bg-white">
                            <i class="fas fa-users fa-3x position-absolute icon"></i>
                            <div class="card-body">
                                <h2 class="card-title">0</h2>
                                <h4 class="card-text">Visitors</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Chart & Calendar --}}
        <div class="pb-4">

            <div class="row row-cols-1 row-cols-lg-2 g-2">

                <div class="col-12 col-lg-9 mb-3 mb-md-0">
                    <div class="card shadow-md border-0 bg-white">
                        <div class="card-header bg-white">
                            <h5 class="card-title pb-0 pt-2">Traffic Management</h5>
                        </div>
                        <div class="card-body">
                            @livewire('charts.traffic')
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="card shadow-md border-0 bg-white">
                        <div class="card-header bg-white">
                            <h5 class="card-title pb-0 pt-2">Projects</h5>
                        </div>
                        <div class="card-body">
                            @livewire('charts.projects')
                        </div>
                    </div>

                </div>

            </div>

        </div>

</x-layouts.panel>
