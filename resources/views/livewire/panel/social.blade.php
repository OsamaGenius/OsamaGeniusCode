<div class="py-5">

    <form class="d-flex mb-3">
        <div class="col text-start">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#social-add-modal"><i class="fas fa-plus me-1"></i>{{ __('Add new') }}</button>
        </div>
        <div x-data="{
            show: false
        }" class="col text-end">
            <div class="d-flex flex-row-reverse text-end">
                <input type="search" x-cloak x-show="show===true" x-transition name="" id=""
                    class="form-control me-2 order-2" placeholder="Search links by their names">
                <a href="#" class="text-dark mt-2 order-1" x-transition x-on:click.prevent="show = !show">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
    </form>

    <div class="table-responsive shadow-md rounded-3">
        <table class="table align-middle">
            <thead class="table-light">
                <caption class="text-center pt-3 mb-0 pb-0">{{ __('Social Links') }}</caption>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('URL') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Added') }}</th>
                    <th>{{ __('Updated') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @if (count($links) > 0)
                    @foreach ($links as $i => $link)
                        <tr>
                            <td scope="row">{{ $i += 1 }}</td>
                            <td><img class="s-50" src="{{ asset('imgs/social/' . $link->name . '.png') }}"
                                    alt="{{ $link->name }}"></td>
                            <td>{{ $link->name }}</td>
                            <td><a href="{{ $link->url }}" target="_blank"
                                    rel="noopener noreferrer">{{ $link->url }}</a></td>
                            <td>{{ $link->status }}</td>
                            <td>{{ $link->created_at->diffForHumans() }}</td>
                            <td>{{ $link->updated_at->diffForHumans() }}</td>
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#social-edit-modal" wire:click.prevent="setSocialID({{$link->id}})">
                                    <i class="fas fa-edit text-primary"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-primary text-center" role="alert">
                                Their is no <strong>Social Link</strong> data saved yet!
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

    <x-modal.def>
        <x-slot:id>{{ 'social-add-modal' }}</x-slot:id>
        <x-slot:title>{{ 'Adding New Social Links' }}</x-slot:title>
        <form wire:submit.prevent='save'>
            {{-- Socail link name --}}
            <x-forms.input>
                <x-slot:type>{{'text'}}</x-slot:type>
                <x-slot:for>{{'name'}}</x-slot:for>
                <x-slot:placeholder>{{'Ex: Facebook'}}</x-slot:placeholder>
            </x-forms.input>
            {{-- Socail link URL --}}
            <x-forms.input>
                <x-slot:type>{{'text'}}</x-slot:type>
                <x-slot:for>{{'url'}}</x-slot:for>
                <x-slot:placeholder>{{'Ex: Https:www.facebook.com/user_name'}}</x-slot:placeholder>
            </x-forms.input>
            {{-- Social Link Status --}}
            <x-forms.radio>
                <x-slot:for>{{ 'status' }}</x-slot:for>
                <x-slot:title>{{ __('Scoial Link Status') }}</x-slot:title>
                <x-slot:values>{{ 'Active,Disables' }}</x-slot:values>
            </x-forms.radio>
            {{-- Submit --}}
            <div class="text-end">
                <button type="submit" class="btn btn-outline-primary s-100">
                    <i class="fas fa-save me-1"></i>{{ __('Save') }}
                </button>
            </div>
        </form>
    </x-modal.def>

    <x-modal.def>
        <x-slot:id>{{ 'social-edit-modal' }}</x-slot:id>
        <x-slot:title>{{ 'Update Old Social Links' }}</x-slot:title>
        <form wire:submit.prevent='update'>
            {{-- Socail link id --}}
            <x-forms.input>
                <x-slot:type>{{'hidden'}}</x-slot:type>
                <x-slot:for>{{'social_id'}}</x-slot:for>
                <x-slot:placeholder>{{''}}</x-slot:placeholder>
            </x-forms.input>
            {{-- Socail link name --}}
            <x-forms.input>
                <x-slot:type>{{'text'}}</x-slot:type>
                <x-slot:for>{{'name'}}</x-slot:for>
                <x-slot:placeholder>{{'Ex: Facebook'}}</x-slot:placeholder>
            </x-forms.input>
            {{-- Socail link URL --}}
            <x-forms.input>
                <x-slot:type>{{'text'}}</x-slot:type>
                <x-slot:for>{{'url'}}</x-slot:for>
                <x-slot:placeholder>{{'Ex: Https:www.facebook.com/user_name'}}</x-slot:placeholder>
            </x-forms.input>
            {{-- Social Link Status --}}
            <x-forms.radio>
                <x-slot:for>{{ 'status' }}</x-slot:for>
                <x-slot:title>{{ __('Scoial Link Status') }}</x-slot:title>
                <x-slot:values>{{ 'Active,Disables' }}</x-slot:values>
            </x-forms.radio>
            {{-- Submit --}}
            <div class="text-end">
                <button type="submit" class="btn btn-outline-success s-100">
                    <i class="fas fa-edit me-1"></i>{{ __('Update') }}
                </button>
                <button type="button" wire:click="cancel" class="btn btn-outline-danger s-100">
                    <i class="fas fa-times me-1"></i>{{ __('Cancel') }}
                </button>
            </div>
        </form>
    </x-modal.def>

</div>

            {{-- Submit --}}
            {{-- <div class="text-end">
                <button type="button" class="btn btn-outline-primary s-100">
                    <i class="fas fa-save me-1"></i>{{ __('Save') }}
                </button>
                {{-- <div class="btn-group" x-cloak x-show="edit === true" x-transition>
                    <button type="button" class="btn btn-outline-success s-100">
                        <i class="fas fa-edit me-1"></i>{{ __('Edit') }}
                    </button>
                    <button type="button" class="btn btn-outline-danger s-100">
                        <i class="fas fa-times me-1"></i>{{ __('Delete') }}
                    </button>
                    <button type="button" class="btn btn-outline-warning s-100">
                        <i class="fas fa-eye-slash me-1"></i>{{ __('Cancel') }}
                    </button>
                </div> 
            </div> --}}