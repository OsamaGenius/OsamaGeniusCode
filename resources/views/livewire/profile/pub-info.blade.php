<div>

    <div class="card shadow-md bg-white">

        <div class="card-header border-light text-bg-dark">

            <h5 class="card-title">{{ __('Update Personal Info') }}</h5>

        </div>

        <div class="card-body">

            <form wire:submit.prevent="update">

                <x-forms.input>
                    <x-slot:for>{{ 'name' }}</x-slot:for>
                    <x-slot:value>{{ Auth::guard('panel')->user()->name }}</x-slot:value>
                    @if ($lastUpdated)
                        <x-slot:disabled>{{ 'readonly' }}</x-slot:disabled>
                    @endif
                    <x-slot:placeholder>{{ 'Username' }}</x-slot:placeholder>
                    <div>
                        @if ($lastUpdated)
                            <em>
                                <small>Time left to change the name again <b class="text-danger">{{ $days }} days</b></small>
                            </em>
                        @else
                            <em>
                                <small>If you changed your username you will have to wait a month to change it agian</small>
                            </em>
                        @endif
                    </div>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:for>{{ 'email' }}</x-slot:for>
                    <x-slot:value>{{ Auth::guard('panel')->user()->email }}</x-slot:value>
                    <x-slot:placeholder>{{ 'Email' }}</x-slot:placeholder>
                    <x-slot:disabled>{{ 'readonly' }}</x-slot:disabled>
                    <em><small>Email can not be changed becouse it used for <strong>Authentication</strong></small></em>
                </x-forms.input>

                <x-forms.textarea>
                    <x-slot:for>{{ 'bio' }}</x-slot:for>
                    <x-slot:value>{{ Auth::guard('panel')->user()->bio }}</x-slot:value>
                    <x-slot:placeholder>{{ 'Simple Bio' }}</x-slot:placeholder>
                    <em><small>Words that descripe your bussiness and what you are offering</small></em>
                </x-forms.textarea>

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
