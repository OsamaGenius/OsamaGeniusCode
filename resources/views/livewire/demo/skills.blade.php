<div>
    @if (count($fLinks) > 0 || count($bLinks) > 0)
        <section class="skills py-5 fade-sections" data-animate="fillProgressBars">
            <div class="container">
                <!-- Section Title -->
                <div class="title text-center mb-5">
                    <h3 class="mb-3">Rating - <span>My Career Skills</span></h3>
                    <div class="decoration">
                        <div class="upline"></div>
                        <div class="downline"></div>
                        <div class="icon"></div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 g-4">

                    <!-- Frontend Skills -->
                    @if (count($fLinks) > 0)
                        <div class="col">

                            <h4 class="mb-4 text-start text-md-center">
                                <i class="fas fa-file me-3"></i>
                                Frontend Skills
                            </h4>

                            @foreach ($fLinks as $i => $link)
                                <div class="position-relative" wire:key="{{ 'Front_' . $i += 1 }}">
                                    <label class="progress-label">{{ $link->percentage }}</label>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar"
                                            aria-valuenow="{{ $link->percentage }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="pe-1 text-end">{{ $link->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif

                    <!-- Backend Skills -->
                    @if (count($bLinks) > 0)
                        <div class="col">

                            <h4 class="mb-4 text-start text-md-center">
                                <i class="fas fa-file me-3"></i>
                                Backend Skills
                            </h4>

                            @foreach ($bLinks as $link)
                                <div class="position-relative" wire:key="{{ 'Back_' . $i += 1 }}">
                                    <label class="progress-label">{{ $link->percentage }}</label>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar"
                                            aria-valuenow="{{ $link->percentage }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="pe-1 text-end">{{ $link->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif

                </div>

            </div>

        </section>
    @endif

</div>
