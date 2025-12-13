<div>

    <x-alerts.session></x-alerts.session>

    <div class="card shadow-md bg-white">

        <div class="card-header border-light text-bg-dark">

            <h5 class="card-title">{{ __('Update Profile Image') }}</h5>

        </div>

        <div class="card-body">

            <form wire:submit.prevent="update">

                <div class="mb-3 text-center">
                    <img 
                        class="card-img-top user_image" 
                        @if ($image)
                            src="{{ $image->temporaryUrl() }}" 
                        @else
                            @if (Auth::guard($guard)->user()->image)
                                src="{{ asset('/storage/' . Auth::guard($guard)->user()->image) }}" 
                            @else
                                src="{{ asset('imgs/user/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png') }}" 
                            @endif
                        @endif
                        alt="Title"
                    >

                    <p wire:loading class="mb-2 w-100 text-center text-secondary">loading...</p>
    
                </div>

                <x-forms.input>
                    <x-slot:type>{{ 'file' }}</x-slot:type>
                    <x-slot:for>{{ 'image' }}</x-slot:for>
                    <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
                </x-forms.input>

                <div class="text-end">
                    <button class="btn btn-outline-success">
                        <i class="fas fa-edit"></i>
                        {{ __('Update') }}
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>
