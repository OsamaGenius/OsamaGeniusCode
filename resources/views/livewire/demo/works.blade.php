<div>
    @if (count($templates) > 0 || count($projects) > 0 || count($photoshop) > 0)
        <section class="works py-5 fade-sections">
            <div class="container">
                <!-- Section Title -->
                <div class="title text-center mb-5">
                    <h3 class="mb-3">My Work - <span>My Latest Works</span></h3>
                    <div class="decoration">
                        <div class="upline"></div>
                        <div class="downline"></div>
                        <div class="icon"></div>
                    </div>
                </div>

                @if (Route::currentRouteName() !== 'homepage') {{-- All Works Page --}}

                    <div class="text-end mb-3">
                        <div class="btn-group">

                            <a href="#" class="text-decoration-none me-3 mt-2">{{ __('All Works') }}</a>

                            <select class="form-select s-150" name="" id="category">
                                <option value="" disabled>Select Category</option>
                                <option value="1">Templates</option>
                            </select>

                            <div class="btn-group">
                                <input type="search" id="search" class="form-control ms-3 s-400 d-none"
                                    placeholder="Search for templates, projects and more">
                                <i class="fas fa-search pt-2 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Latest Templates --}}
                    @if (count($templates) > 0)
                        <h4 class="mb-3">{{ 'Latest ' . $templates[0]->category }}</h4>
                        @livewire('demo.work.card', ['projects' => $templates], key($templates[0]->id))
                    @endif

                    {{-- Latest Projects --}}
                    @if (count($projects) > 0)
                        <h4 class="mb-3">{{ 'Latest ' . $projects[0]->category }}</h4>
                        @livewire('demo.work.card', ['projects' => $projects], key($projects[0]->id))
                    @endif

                    {{-- Latest Photoshop --}}
                    @if (count($photoshop) > 0)
                        <h4 class="mb-3">{{ 'Latest ' . $photoshop[0]->category }}</h4>
                        @livewire('demo.work.card', ['projects' => $photoshop], key($photoshop[0]->id))
                    @endif
                @else
                    {{-- Homepage works --}}
                    {{-- Latest Templates --}}
                    @if (count($templates) > 0)
                        <h4 class="mb-3">{{ 'Latest ' . $templates[0]->category }}</h4>
                        @livewire('demo.work.card', ['projects' => $templates], key($templates[0]->id))
                    @endif

                    {{-- Latest Projects --}}
                    @if (count($projects) > 0)
                        <h4 class="mb-3">{{ 'Latest ' . $projects[0]->category }}</h4>
                        @livewire('demo.work.card', ['projects' => $projects], key($projects[0]->id))
                    @endif

                    {{-- Latest Photoshop --}}
                    @if (count($photoshop) > 0)
                        <h4 class="mb-3">{{ 'Latest ' . $photoshop[0]->category }}</h4>
                        @livewire('demo.work.card', ['projects' => $photoshop], key($photoshop[0]->id))
                    @endif
                @endif

            </div>
            <!---->
        </section>
    @else
        @if (Route::currentRouteName() !== 'homepage')
            <div class="container py-5">
                <div class="alert alert-info text-center" role="alert">
                    Their are no <strong>projects or templates</strong> in the warehouse yet!
                </div>
            </div>
        @endif
    @endif
</div>
