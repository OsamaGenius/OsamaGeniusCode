<div class="py-4">

    {{-- Flashed Messages [Success | Error] --}}
    <x-alerts.session></x-alerts.session>

    {{-- Adding new users button & Searching --}}
    <x-tables.search>
        <x-slot:title>{{ __('Users Management Table') }}</x-slot:title>
        <x-slot:add>{{ 'user-add-modal' }}</x-slot:add>
        <x-slot:thead>
            <th>{{ __('#') }}</th>
            <th>{{ __('Image') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Approvent') }}</th>
            <th>{{ __('Group ID') }}</th>
            <th>{{ __('Bio') }}</th>
            <th>{{ __('Created') }}</th>
            <th>{{ __('Updated') }}</th>
            <th>{{ __('Action') }}</th>
        </x-slot:thead>
        <x-slot:tbody>
            @if (count($users) > 0)
                @foreach ($users as $i => $user)
                    <tr wire:key="{{$i}}">
                        <td>{{$i += 1}}</td>
                        <td>
                            <img 
                                class="d-block s-100 h-100 rounded-4 border-2 border-light shadow-sm" 
                                src="{{$user->image ? asset('/storage/'.$user->image) : asset('imgs/user/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png')}}" 
                                alt="Actor"
                            >
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->approvent}}</td>
                        <td>{{$user->group_id}}</td>
                        <td>{{$user->bio}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td>
                            <button type="button" class="btn" title="Edit"
                                x-on:click="$dispatch('open-modal', {name: 'user-edit-modal'})"
                                wire:click.prevent="setSocialID({{ $user->id }})">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                            <button type="button" class="btn" title="Delete"
                                x-on:click="$dispatch('open-modal', {name: 'user-del-modal'})"
                                wire:click.prevent="setSocialID({{ $user->id }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="11">
                        <div class="alert alert-primary text-center" role="alert">
                            There is no <strong>Users</strong> found!
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:tbody>
    </x-tables.search>

    {{ $users->links() }}

    {{-- Adding Modal Form --}}
    <x-modal.def name="user-add-modal" title="Adding New Users" class="modal-wider">
        <form wire:submit.prevent='save'>
            {{-- Show 2 cols in larg screen & from medium to down show one col --}}
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <div class="col">
                    {{-- User Image --}}
                    <div class="text-center mb-3">
                        <img 
                            class="user_image mb-3" 
                            @if ($image)
                                src="{{ $image->temporaryUrl() }}" 
                            @else
                                src="{{ asset('imgs/user/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png') }}" 
                            @endif
                            alt="User_Image"
                        >
                        <div>
                            <span wire:loading class="text-success">loading...</span>
                        </div>
                        <x-forms.input>
                            <x-slot:type>{{ 'file' }}</x-slot:type>
                            <x-slot:for>{{ 'image' }}</x-slot:for>
                            <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
                        </x-forms.input>
                    </div>
                    {{-- User name --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'name' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Ex: Ali Ahmed' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- User Email Address --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'email' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Ex: Ali768@gmail.com' }}</x-slot:placeholder>
                    </x-forms.input>
                </div>
                <div class="col">
                    {{-- User Status --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'status' }}</x-slot:for>
                        <x-slot:title>{{ __('User Status') }}</x-slot:title>
                        <x-slot:values>{{ 'Active,Not Active' }}</x-slot:values>
                    </x-forms.radio>
                    {{-- User Approvent --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'approvent' }}</x-slot:for>
                        <x-slot:title>{{ __('User Approvent') }}</x-slot:title>
                        <x-slot:values>{{ 'Yes,No' }}</x-slot:values>
                    </x-forms.radio>
                    {{-- User Group ID --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'group_id' }}</x-slot:for>
                        <x-slot:title>{{ __('User Group') }}</x-slot:title>
                        <x-slot:values>{{ 'Admins,Users' }}</x-slot:values>
                    </x-forms.radio>
                    {{-- User Password --}}
                    <div class="d-flex mb-3">
                        <div style="flex-grow: 1">
                            <x-forms.input>
                                <x-slot:type>{{ 'password' }}</x-slot:type>
                                <x-slot:for>{{ 'password' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Ex: Admin@10#qo12' }}</x-slot:placeholder>
                            </x-forms.input>
                        </div>
                        <div>
                            <div class="btn-group">
                                <button class="btn btn-outline-success py-2 mt-2 ms-1" wire:click.prevent="generate">
                                    <i class="fas fa-gear me-1"></i>
                                    {{ __('Generate') }}
                                </button>
                                <button class="btn btn-outline-success py-2 mt-2" wire:click.prevent="$dispatch('copy', '{{$password}}')">
                                    <i class="fas fa-file me-1"></i>
                                    {{ __('Copy') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Submit --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-outline-primary s-100">
                            <i class="fas fa-save me-1"></i>{{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-modal.def>

    {{-- Editing Modal Form --}}
    <x-modal.def name="user-edit-modal" title="Update Users" class="modal-wider">
        <form wire:submit.prevent='update'>
            {{-- User ID --}}
            <x-forms.input>
                <x-slot:type>{{ 'hidden' }}</x-slot:type>
                <x-slot:for>{{ 'user_id' }}</x-slot:for>
                <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Show 2 cols in larg screen & from medium to down show one col --}}
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <div class="col">
                    {{-- User Image --}}
                    <div class="text-center mb-3">
                        <img 
                            class="user_image mb-3" 
                            @if ($image)
                                src="{{ $image->temporaryUrl() }}" 
                            @else
                                @if ($path)
                                    src="{{ asset('/storage/' . $path) }}" 
                                @else
                                    src="{{ asset('/storage/Profiles/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png') }}" 
                                @endif
                            @endif
                            alt="User_Image"
                        >
                        <div>
                            <span wire:loading class="text-success">loading...</span>
                        </div>
                        <x-forms.input>
                            <x-slot:type>{{ 'file' }}</x-slot:type>
                            <x-slot:for>{{ 'image' }}</x-slot:for>
                            <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
                        </x-forms.input>
                    </div>
                    {{-- User name --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'name' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Ex: Ali Ahmed' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- User Email Address --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'email' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Ex: Ali768@gmail.com' }}</x-slot:placeholder>
                    </x-forms.input>
                </div>
                <div class="col">
                    {{-- User Status --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'status' }}</x-slot:for>
                        <x-slot:title>{{ __('User Status') }}</x-slot:title>
                        <x-slot:values>{{ 'Active,Not Active' }}</x-slot:values>
                    </x-forms.radio>
                    {{-- User Approvent --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'approvent' }}</x-slot:for>
                        <x-slot:title>{{ __('User Approvent') }}</x-slot:title>
                        <x-slot:values>{{ 'Yes,No' }}</x-slot:values>
                    </x-forms.radio>
                    {{-- User Group ID --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'group_id' }}</x-slot:for>
                        <x-slot:title>{{ __('User Group') }}</x-slot:title>
                        <x-slot:values>{{ 'Admins,Users' }}</x-slot:values>
                    </x-forms.radio>
                    {{-- User Password --}}
                    <div class="d-flex mb-3">
                        <div style="flex-grow: 1">
                            <x-forms.input>
                                <x-slot:type>{{ 'password' }}</x-slot:type>
                                <x-slot:for>{{ 'password' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Ex: Admin@10#qo12' }}</x-slot:placeholder>
                            </x-forms.input>
                        </div>
                        <div>
                            <div class="btn-group">
                                <button class="btn btn-outline-success py-2 mt-2 ms-1" wire:click.prevent="generate">
                                    <i class="fas fa-gear me-1"></i>
                                    {{ __('Generate') }}
                                </button>
                                <button class="btn btn-outline-success py-2 mt-2" wire:click.prevent="$dispatch('copy', '{{$password}}')">
                                    <i class="fas fa-file me-1"></i>
                                    {{ __('Copy') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Submit --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-outline-primary s-100">
                            <i class="fas fa-save me-1"></i>{{ __('Update') }}
                        </button>
                        <button type="button" wire:click.prevent="cancel" class="btn btn-outline-danger s-100">
                            <i class="fas fa-times me-1"></i>{{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-modal.def>

    {{-- Confirm Deleting Modal --}}
    <x-modal.def name="user-del-modal">
        <x-slot:type>{{ 'confirm' }}</x-slot:type>
    </x-modal.def>

</div>
