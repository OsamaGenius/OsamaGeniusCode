<div>

    <div class="card bg-white border-0 shadow rounded-0">

        <div class="card-header border-0 bg-white">
            <h5 class="card-title text-center pt-2">Create <strong>OsamaGenius</strong> Account</h5>
        </div>

        <div class="card-body">

            <form wire:submit.prevent="registerNewUser">
                {{-- Username --}}
                <x-forms.input>
                    <x-slot:for>{{ 'name' }}</x-slot:for>
                    <x-slot:placeholder>{{ 'Enter Username' }}</x-slot:placeholder>
                </x-forms.input>
                {{-- Email --}}
                <x-forms.input>
                    <x-slot:for>{{ 'email' }}</x-slot:for>
                    <x-slot:type>{{ 'email' }}</x-slot:type>
                    <x-slot:placeholder>{{ 'Enter Email' }}</x-slot:placeholder>
                </x-forms.input>
                {{-- Password --}}
                <x-forms.input>
                    <x-slot:for>{{ 'password' }}</x-slot:for>
                    <x-slot:type>{{ 'password' }}</x-slot:type>
                    <x-slot:placeholder>{{ 'Enter Password' }}</x-slot:placeholder>
                </x-forms.input>

                <button class="btn btn-outline-success w-100 rounded-5 mb-3">
                    <i class="fas fa-pen"></i>
                    {{ __('Create') }}
                </button>

            </form>

            <div class="d-flex justify-content-center align-items-baseline mb-3">
                <i class="fas fa-arrow-right me-3"></i>
                <h4>OR</h4>
                <i class="fas fa-arrow-left ms-3"></i>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-2">

                <div class="col">
                    <button class="btn btn-outline-danger w-100 text-start rounded-5"><i
                            class="fab fa-google me-2"></i>Google</button>
                </div>

                <div class="col">
                    <button class="btn btn-outline-dark w-100 text-start rounded-5"><i
                            class="fab fa-github me-2"></i>Github</button>
                </div>

                <div class="col">
                    <button class="btn btn-outline-primary w-100 text-start rounded-5"><i
                            class="fab fa-facebook me-2"></i>Facbook</button>
                </div>

            </div>

        </div>

        <div class="card-footer text-center py-3 bg-white border-0">
            Aleardy have account <a class="text-decoration-none" href="{{ route('login') }}">Login in here</a>
        </div>

    </div>

</div>
