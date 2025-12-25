<div class="py-4">

    {{-- Flashed Messages [Success | Error] --}}
    <x-alerts.session></x-alerts.session>

    {{-- Adding new social links button & Searching --}}
    <x-tables.search>
        <x-slot:title>{{__('Social Links Management Table')}}</x-slot:title>
        <x-slot:add>{{ 'social-add-modal' }}</x-slot:add>
        <x-slot:thead>
            <th>{{ __('#') }}</th>
            <th>{{ __('Image') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('URL') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Added') }}</th>
            <th>{{ __('Updated') }}</th>
            <th>{{ __('Action') }}</th>
        </x-slot:thead>
        <x-slot:tbody>
            @if (count($links) > 0)
                @foreach ($links as $i => $link)
                    <tr wire:key="{{$i}}">
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
                            <button type="button" class="btn" title="Edit"
                                x-on:click="$dispatch('open-modal', {name: 'social-edit-modal'})"
                                wire:click.prevent="setSocialID({{ $link->id }})">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                            <button type="button" class="btn" title="Delete"
                                x-on:click="$dispatch('open-modal', {name: 'social-del-modal'})"
                                wire:click.prevent="setSocialID({{ $link->id }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">
                        <div class="alert alert-primary text-center" role="alert">
                            There is no <strong>Social Links</strong> found!
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:tbody>
    </x-tables.search>

    {{ $links->links() }}

    {{-- Adding Modal Form --}}
    <x-modal.def name="social-add-modal" title="Adding new links"> 
        <form wire:submit.prevent='save'>
            {{-- Socail link name --}}
            <x-forms.input>
                <x-slot:for>{{ 'name' }}</x-slot:for>
                <x-slot:placeholder>{{ 'Ex: Facebook' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Socail link URL --}}
            <x-forms.input>
                <x-slot:for>{{ 'url' }}</x-slot:for>
                <x-slot:placeholder>{{ 'Ex: Https:www.facebook.com/user_name' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Social Link Status --}}
            <x-forms.radio>
                <x-slot:for>{{ 'status' }}</x-slot:for>
                <x-slot:title>{{ __('Scoial Link Status') }}</x-slot:title>
                <x-slot:values>{{ 'Active,Disabled' }}</x-slot:values>
            </x-forms.radio>
            {{-- Submit --}}
            <div class="text-end">
                <button type="submit" class="btn btn-outline-primary s-100">
                    <i class="fas fa-save me-1"></i>{{ __('Save') }}
                </button>
            </div>
        </form>
    </x-modal.def>

    {{-- Editing Modal Form --}}
    <x-modal.def name="social-edit-modal" title="Update Old Social Links">
        <form wire:submit.prevent='update'>
            {{-- Socail link id --}}
            <x-forms.input>
                <x-slot:type>{{ 'hidden' }}</x-slot:type>
                <x-slot:for>{{ 'social_id' }}</x-slot:for>
                <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Socail link name --}}
            <x-forms.input>
                <x-slot:for>{{ 'name' }}</x-slot:for>
                <x-slot:placeholder>{{ 'Ex: Facebook' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Socail link URL --}}
            <x-forms.input>
                <x-slot:type>{{ 'text' }}</x-slot:type>
                <x-slot:for>{{ 'url' }}</x-slot:for>
                <x-slot:placeholder>{{ 'Ex: Https:www.facebook.com/user_name' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Social Link Status --}}
            <x-forms.radio>
                <x-slot:for>{{ 'status' }}</x-slot:for>
                <x-slot:title>{{ __('Scoial Link Status') }}</x-slot:title>
                <x-slot:values>{{ 'Active,Disabled' }}</x-slot:values>
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

    {{-- Confirm Deleting Modal --}}
    <x-modal.def name="social-del-modal">
        <x-slot:type>{{ 'confirm' }}</x-slot:type>
    </x-modal>

</div>
