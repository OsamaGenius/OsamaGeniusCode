<div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 mb-4 position-relative">

        @foreach ($projects as $project)

            <div class="col" wire:key="{{ $project->id }}" data-cate="{{ $project->category }}">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-1 position-relative">

                        <span class="badge bg-danger opacity-80 py-2 position-absolute">{{$project->category}}</span>

                        <img src="{{ $project->image !== null ? asset('/storage/' . $project->image) : asset('imgs/hero-img.png') }}"
                            alt="temp" class="card-img aspect-square object-cover" />

                        <div class="py-3 px-2">

                            <h5 class="card-title mb-1">{{ $project->title }}</h5>

                            @if ($project->price > 0)
                                <h6>{{ '$' . $project->price }}</h6>
                            @else
                                <span class="text-success">{{ 'Free' }}</span>
                            @endif

                            <div class="text-end mt-3">

                                <div class="btn-group">

                                    <a href="{{ $project->project_url }}" target="__blank"
                                        class="btn btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i>Demo
                                    </a>

                                    @if ($project->price > 0)
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-download me-1"></i>Download
                                        </a>
                                    @endif
                                    
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

        @if (Route::currentRouteName() === 'homepage')
            <div class="position-absolute show-all-btn">
                <a href="{{ route('works') }}" class="btn btn-outline-success rounded-5 overflow-hidden">
                    <i class="fas fa-eye me-2"></i>
                    {{ __('All') }}
                </a>
            </div>
        @endif

    </div>

</div>
