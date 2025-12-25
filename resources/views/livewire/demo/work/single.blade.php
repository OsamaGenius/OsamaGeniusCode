@php
    $converter = app(\League\CommonMark\CommonMarkConverter::class);
@endphp
<div x-data="{ message: `{{ (string) $converter->convertToHtml($project[0]->description) }}` }">

    <div class="container">

        {{-- Project Details --}}
        <div class="row row-cols-1 row-cols-md-2 g-5 py-5">

            @php
            if($project[0]->category === 'Template') {
                $color = 'danger'; 
            } else if($project[0]->category === 'Project') {
                $color = 'success'; 
            } else {
                $color = 'info'; 
            }
        @endphp

            {{-- Projcet Image --}}
            <div class="col">
                <img class="d-block w-100 rounded-3 shadow-md border border-3 border-white"
                    src="{{ $project[0]->image !== null
                        ? asset('/storage/' . $project[0]->image)
                        : asset('imgs/projects/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqru2m0dJ.jpg') }}"
                    alt="Project_Image">
            </div>

            {{-- Project Details --}}
            <div class="col">
                {{-- Title --}}
                <h3 class="text-center bg-{{$color}} bg-opacity-25 text-{{$color}}-emphasis py-3 rounded-3">
                    {{ $project[0]->title }}</h3>
                <hr class="mb-5">
                {{-- Video --}}
                @if ($project[0]->video)
                    <video class="w-100 d-block rounded-2 shadow-sm mb-5" src="{{ $project[0]->video }}"></video>
                @endif
                {{-- Category --}}
                <div class="mb-3 d-flex">
                    <h4 class="text-start">{{ __('Project Category') }}</h4>
                    <div class="grow text-end">
                        <span
                            class="bg-{{$color}} bg-opacity-25 text-{{$color}}-emphasis py-2 px-4 rounded-1 shadow-sm">{{ $project[0]->category }}
                            </sapn>
                    </div>
                </div>
                {{-- Price --}}
                <div class="mb-3 d-flex">
                    <h4 class="text-start">{{ __('Project Price') }}</h4>
                    <div class="grow text-end text-{{$color}}-emphasis">
                        @if ($project[0]->price > 0)
                            <p>{{ '$' . $project[0]->price }}</p>
                        @else
                            <p><span
                                    class="bg-{{$color}} bg-opacity-25 text-{{$color}}-emphasis py-2 px-3 rounded-3">{{ 'Free' }}</span>
                            </p>
                        @endif
                    </div>
                </div>
                {{-- Texh Stack --}}
                <h4 class="text-start">{{ __('Project Technologies') }}</h4>
                @php
                    $result = explode(',', $project[0]->tech_stack);
                    $result = Arr::map($result, function ($el) {
                        return Str::replace('[', '', $el);
                    });
                    $result = Arr::map($result, function ($el) {
                        return Str::replace(']', '', $el);
                    });
                    $result = Arr::map($result, function ($el) {
                        return Str::replace('"', '', $el);
                    });
                    $result = Arr::map($result, function ($el) {
                        return Str::replace("'", '', $el);
                    });
                @endphp
                
                <div class="d-flex mt-3">
                    @foreach ($result as $i => $item)
                        <span
                            wire:key="{{ $color . '_' . $i +=1 }}"
                            class="
                                py-1 
                                px-3 
                                rounded-3 
                                me-2 
                                bg-{{$color}} 
                                bg-opacity-25 
                                text-{{$color}}-emphasis 
                                border 
                                border-{{$color}} 
                                border-opacity-50 
                                shadow-md
                            ">{{ $item }}</span>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Project Description --}}
        <div class="pb-5">
            <p x-html="message" class="markedDown"></p>
        </div>

        {{-- Similar Works --}}
        @if (count($projects) > 0)
            <div class="title text-center mb-5">
                <h3 class="mb-3">Works - <span>Similar Works</span></h3>
                <div class="decoration">
                    <div class="upline"></div>
                    <div class="downline"></div>
                    <div class="icon"></div>
                </div>
            </div>
            @livewire(
                'demo.work.card',
                [
                    'projects' => $projects,
                ],
                key(Hash::make($projects[0]->id))
            )
        @endif
    </div>

</div>
