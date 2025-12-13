<div>

    <div class="card shadow-md bg-white">

        <div class="card-header border-light text-bg-dark">

            <h5 class="card-title">{{ __('Update User Password') }}</h5>

        </div>

        <div class="card-body">

            <p>Make sure the password contains at least one small character, capital character, number, and one symbel
                also it's lenght at least 8 characters.</p>

            <form wire:submit.prevent="update">

                <x-forms.input>
                    <x-slot:for>{{ 'password' }}</x-slot:for>
                    <x-slot:type>{{ 'password' }}</x-slot:type>
                    <x-slot:placeholder>{{ 'Password' }}</x-slot:placeholder>
                    <div>
                        <em>
                            <small>Don't use <strong>old passwords</strong> again, make sure to choose
                                <strong>strong</strong> once.</small>
                        </em>
                    </div>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:for>{{ 'password_confirm' }}</x-slot:for>
                    <x-slot:type>{{ 'password' }}</x-slot:type>
                    <x-slot:placeholder>{{ 'Confirm Password' }}</x-slot:placeholder>
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
