<x-layouts.panel>

    <x-slot:title>{{ __('Manage Your Profile') }}</x-slot:title>

    <div class="container py-5 profile">

        {{-- Image & Security --}}
        <div class="row row-cols-1 row-cols-md-2 g-3 mb-3">

            {{-- Image --}}
            <div class="col">
                @livewire('profile.image', ['guard' => 'panel'])
            </div>

            {{-- Securiry --}}
            <div class="col">
                @livewire('profile.password', ['guard' => 'panel'])
            </div>

        </div>

        {{-- Public Info & Address --}}
        <div class="row row-cols-1 row-cols-md-2 g-3">

            {{-- Public Info --}}
            <div class="col">

                <div class="card shadow-md bg-white">

                    <div class="card-header border-light text-bg-dark">

                        <h5 class="card-title">{{ __('Update Personal Info') }}</h5>

                    </div>

                    <div class="card-body">

                        <form>

                            <x-forms.input>
                                <x-slot:for>{{'username'}}</x-slot:for>
                                <x-slot:value>{{Auth::guard('panel')->user()->name}}</x-slot:value>
                                <x-slot:placeholder>{{'Username'}}</x-slot:placeholder>
                                <em><small>If you changed your username you will have to wait a month to change it agian</small></em>
                            </x-forms.input>

                            <x-forms.input>
                                <x-slot:for>{{'email'}}</x-slot:for>
                                <x-slot:value>{{Auth::guard('panel')->user()->email}}</x-slot:value>
                                <x-slot:placeholder>{{'Email'}}</x-slot:placeholder>
                                <em><small>Email can not be changed becouse it used for <strong>Authentication</strong></small></em>
                            </x-forms.input>

                            <x-forms.textarea>
                                <x-slot:for>{{'bio'}}</x-slot:for>
                                <x-slot:value>{{Auth::guard('panel')->user()->bio}}</x-slot:value>
                                <x-slot:placeholder>{{'Simple Bio'}}</x-slot:placeholder>
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

            {{-- Shipping Address --}}
            <div class="col">

                <div class="card shadow-md bg-white">

                    <div class="card-header border-light text-bg-dark">

                        <h5 class="card-title">{{ __('Update Address') }}</h5>

                    </div>

                    <div class="card-body">

                        <form>

                            {{-- Addresses --}}
                            <div class="row row-cols-1 row-cols-lg-2 g-2">

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'address1'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Address 1'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'address2'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Address 2'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                            </div>

                            {{-- Country & State --}}
                            <div class="row row-cols-1 row-cols-lg-2 g-2">

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'country'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Country'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'state'}}</x-slot:for>
                                        <x-slot:placeholder>{{'State'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                            </div>

                            {{-- City & Street --}}
                            <div class="row row-cols-1 row-cols-lg-2 g-2">

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'city'}}</x-slot:for>
                                        <x-slot:placeholder>{{'City'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'street'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Street'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                            </div>

                            {{-- Block & Building --}}
                            <div class="row row-cols-1 row-cols-lg-2 g-2">

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'block'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Block'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'building'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Building'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                            </div>

                            {{-- Nearby & Type --}}
                            <div class="row row-cols-1 row-cols-lg-2 g-2">

                                <div class="col">

                                    <x-forms.input>
                                        <x-slot:for>{{'nearby'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Nearby Place'}}</x-slot:placeholder>
                                    </x-forms.input>
        
                                </div>

                                <div class="col">

                                    <x-forms.select>
                                        <x-slot:for>{{'type'}}</x-slot:for>
                                        <x-slot:placeholder>{{'Address Type'}}</x-slot:placeholder>
                                    </x-forms.select>
        
                                </div>

                            </div>

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

        </div>

    </div>

</x-layouts.panel>
