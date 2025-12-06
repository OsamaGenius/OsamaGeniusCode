<div x-data="{
    show: @entangle('show')
}">

    <x-alerts.session></x-alerts.session>

    <div class="login rounded-3 s-400 p-3 mt-5 position-absolute">

        <h5 class="text-center">Request reset code</h5>

        <hr>

        <form wire:submit.prevent="sendCode">

            <div x-cloak x-show="show" x-transition>

                {{-- Send Verification Code --}}
                <x-forms.input>
                    <x-slot:for>{{ 'email' }}</x-slot:for>
                    <x-slot:placeholder>{{ 'Enter your email' }}</x-slot:placeholder>
                </x-forms.input>

                <div class="text-end">
                    <button class="btn btn-outline-success" title="Send Verification Code To Email">
                        <i class="fas fa-location-arrow"></i>
                        {{ __('Send') }}
                    </button>
                </div>

            </div>

        </form>

        <form wire:submit.prevent="confirmCode">

            <div x-cloak x-show="!show" x-transition>

                {{-- Confirm Verification Code --}}
                <x-forms.input>
                    <x-slot:for>{{ 'code' }}</x-slot:for>
                    <x-slot:placeholder>{{ 'Enter verification code' }}</x-slot:placeholder>
                </x-forms.input>

                <div class="text-end">
                    <div class="btn-group">
                        <button class="btn btn-outline-danger" title="Resend Verification Code">
                            <i class="fas fa-refresh"></i>
                            {{ __('Re-send') }}
                        </button>
                        <button class="btn btn-outline-success" title="Confirm Code To Reset Password">
                            <i class="fas fa-check-double"></i>
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </div>

            </div>

        </form>

    </div>

</div>
