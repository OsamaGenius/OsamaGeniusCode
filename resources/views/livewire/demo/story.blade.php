<div>

    @if (count($stories) > 0)

        <section class="story py-5 fade-sections">

            <div class="container">

                {{-- Title --}}
                <div class="title text-center mb-5">
                    <h3 class="mb-3">My Story - <span>Time Line Story</span></h3>
                    <div class="decoration">
                        <div class="upline"></div>
                        <div class="downline"></div>
                        <div class="icon"></div>
                    </div>
                </div>

                {{-- Story --}}
                <div class="container">

                    <div class="border-3 border-start ps-4 timeline">

                        @foreach ($stories as $i => $story)
                            <div class="position-relative ps-2 py-3 my-0">

                                {{-- Time Line --}}
                                <div id="circle" class="circle" data-animate="circleShow">
                                    <label for="circle" class="circle-title">{{ $i += 1 }}</label>
                                </div>

                                {{-- <span class="timeline-date">25, JUN 2025</span> --}}
                                <span class="timeline-date">{{ $story->updated_at->format('d, M y') }}</span>

                                {{-- Story Body --}}
                                <p class="mt-2">{{ $story->title }}</p>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </section>

    @endif

</div>
