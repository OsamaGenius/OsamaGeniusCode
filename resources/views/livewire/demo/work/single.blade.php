<div x-data>

    <div class="container">

        {{-- Project Details --}}
        <div class="row row-cols-1 row-cols-md-2 g-5 py-5">

            {{-- Projcet Image --}}
            <div class="col">
                <img class="d-block w-100 rounded-3 shadow-md border border-white"
                    src="{{ $project[0]->image !== null
                        ? asset('/storage/' . $project[0]->image)
                        : asset('imgs/projects/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqru2m0dJ.jpg') }}"
                    alt="Project_Image">
            </div>

            {{-- Project Details --}}
            <div class="col">
                {{-- Title --}}
                <h3 class="text-center">{{ $project[0]->title }}</h3>
                <hr class="mb-5">
                {{-- Video --}}
                @if ($project[0]->video)
                    <video class="w-100 d-block rounded-2 shadow-sm mb-5" src="{{ $project[0]->video }}"></video>
                @endif
                {{-- Category --}}
                <div class="mb-3 d-flex">
                    <h4 class="text-start">{{ __('Project Category') }}</h4>
                    <div class="flex-grow-1 text-end">
                        <span class="text-bg-success py-2 px-4 rounded-1 shadow-sm">{{ $project[0]->category }}</sapn>
                    </div>
                </div>
                {{-- Price --}}
                <div class="mb-3 d-flex">
                    <h4 class="text-start">{{ __('Project Price') }}</h4>
                    <div class="flex-grow-1 text-end">
                        @if ($project[0]->price > 0)
                            <p>{{ '$' . $project[0]->price }}</p>
                        @else
                            <p class="text-success">{{ 'Free' }}</p>
                        @endif
                    </div>
                </div>
                {{-- Texh Stack --}}
                <h4 class="text-start">{{ __('Project Technologies') }}</h4>
                @php
                    $result = explode(',', $project[0]->tech_stack);
                    $result = Arr::map($result, function($el) { return Str::replace('[', '', $el); });
                    $result = Arr::map($result, function($el) { return Str::replace(']', '', $el); });
                    $result = Arr::map($result, function($el) { return Str::replace('"', '', $el); });
                    $result = Arr::map($result, function($el) { return Str::replace("'", '', $el); });
                @endphp
                <div class="d-flex mt-3">
                    @foreach ($result as $item)
                        <span class="py-1 px-3 rounded-3 me-2 text-bg-success shadow-sm">{{$item}}</span>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Project Description --}}
        @php
            $converter = app(\League\CommonMark\CommonMarkConverter::class);
        @endphp
        <div class="pb-5" x-data="{
            message: '$converter->convertToHtml($project[0]->description)',
        }">
            <p x-html="message"></p>
        </div>

    </div>

</div>
