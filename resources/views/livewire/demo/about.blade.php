<div x-data="{about: @entangle('about')}">
    @if ($about)
        <section class="about pt-5 pb-0 fade-sections">

            <div class="container">
                <div class="title text-center mb-5">
                    <h3 class="mb-3">Who Is Me - <span>Get Familiar With Me</span></h3>
                    <div class="decoration">
                        <div class="upline"></div>
                        <div class="downline"></div>
                        <div class="icon"></div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 g-3">
                    <div class="col">
                        <p x-html="about"></p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('imgs/hero-img.png') }}" alt="Why Me" class="d-block w-100 grayscale-50" />
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
