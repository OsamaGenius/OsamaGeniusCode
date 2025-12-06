<div>
    
    <div class="login rounded-3 s-400 p-3 position-absolute">
        <h5 class="text-center">Login to start your secured session</h5>
        <hr>
        <form wire:submit.prevent="login">
            {{-- Email --}}
            <x-forms.input>
                <x-slot:for>{{'email'}}</x-slot:for>
                <x-slot:placeholder>{{'User ID'}}</x-slot:placeholder>
            </x-forms.input>
            {{-- Password --}}
            <x-forms.input>
                <x-slot:for>{{'password'}}</x-slot:for>
                <x-slot:type>{{'password'}}</x-slot:type>
                <x-slot:placeholder>{{'Password'}}</x-slot:placeholder>
            </x-forms.input>
            <div class="text-start mb-2">
                <a class="text-decoration-none" href="{{route('panel.auth.reset')}}">{{__('Forget Password')}}</a>
            </div>
            <div class="text-end">
                <button class="btn btn-outline-success">
                    <i class="fas fa-lock"></i>
                    {{__('Login')}}
                </button>
            </div>
        </form>
    </div>

</div>
