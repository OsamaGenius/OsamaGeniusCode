<div x-data="{
    search: false,
    result: @entangle('result')
}">

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

                    <div class="text-end mb-3 position-relative">

                        {{-- Filter by searching & select category --}}
                        <div class="btn-group">

                            <select x-cloak x-show="search === false" x-transition class="form-select s-150"
                                wire:model.live.throttle.150ms="category">
                                <option value="" disabled selected>Select Category</option>
                                <option value="All">All Works</option>
                                <option value="Template">Templates</option>
                                <option value="Project">Projects</option>
                                <option value="photoshop">Photoshop</option>
                            </select>

                            <div class="btn-group">
                                <input x-cloak x-show="search" x-transition type="search"
                                    wire:model.live.throttle.100ms="search" class="form-control ms-3"
                                    style="width: 400px"
                                    placeholder="Search for templates, projects and more">
                                <i class="fas fa-search pt-2 ms-3" style="cursor: pointer"
                                    x-on:click.prevent="search = !search"></i>
                            </div>

                        </div>

                        <div 
                            class="position-absolute bg-white border border-2 shadow-lg rounded-3 p-3 mt-2 search-box" 
                            style="width: 500px"
                            x-cloak 
                            x-show="result" 
                            x-transition
                        >

                            @if ($searchResult)

                                @if (count($searchResult) > 0)

                                    @foreach ($searchResult as $i => $item)

                                        <div class="text-start mb-0" wire:key="{{'Search_' . $i+=1}}">
                                            <div class="d-flex">
                                                <h5 class="mb-0">
                                                    <a class="text-decoration-none"
                                                        href="{{ route('works.single', ['project_id'=>$item->id]) }}">{{ $item->title }}</a>
                                                </h5>
                                                <p class="mb-0 text-end grow">
                                                    {{ $item->price > 0 ? '$' . $item->price : 'Free' }}</p>
                                            </div>
                                            <p class="mb-3">{{ $item->bio }}</p>
                                        </div>

                                        @if ($i < count($searchResult))
                                            <hr>                                            
                                        @endif

                                    @endforeach
                                @else
                                    <div class="alert alert-info text-center" role="alert">
                                        No result founded for <strong>{{$search}}</strong> keyword
                                    </div>
                                @endif

                            @endif

                        </div>

                    </div>

                    {{-- Latest Templates --}}
                    @if (count($cateResult) > 0)
                        @livewire('demo.work.card', ['projects' => $cateResult], key(Hash::make($cateResult[0]->id)))
                    @else
                        <div class="alert alert-info text-center" role="alert">
                            No results founded matching this <strong>filter</strong>
                        </div>
                        
                    @endif

                @else {{-- Homepage works --}}

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
