<div>
    @if (count($links) > 0)
        <section class="social-links py-4 shadow-sm text-center fade-sectionw">
            <div class="container">

                <div class="row row-cols-6 g-0">

                    @foreach ($links as $i => $link)
                        <div class="col" wire:key="{{ 'Link_' . $i += 1 }}">
                            <a href="{{$link->url}}">
                                <img class="" src="{{ asset('imgs/social/'.$link->name . '.png') }}" alt="{{$link->name}}" />
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif

</div>
