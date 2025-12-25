@php
    $converter = app(\League\CommonMark\CommonMarkConverter::class);
@endphp

<div x-data="{
    payed: @entangle('payment'),
    markdown: @entangle('markdown'),
    status: 'code',
}" class="py-5">

    {{-- Success & Failure Messages --}}
    <x-alerts.session></x-alerts.session>

    {{-- Works Data Table View --}}
    <x-tables.search>
        <x-slot:title>{{ __('Works Management Table') }}</x-slot:title>
        <x-slot:add>{{ 'works-add-modal' }}</x-slot:add>
        <x-slot:thead>
            <th>{{ __('#') }}</th>
            <th>{{ __('Image') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Project URL') }}</th>
            <th>{{ __('Repo URL') }}</th>
            <th>{{ __('Category') }}</th>
            <th>{{ __('Tech Stack') }}</th>
            <th>{{ __('Vedio Link') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Added') }}</th>
            <th>{{ __('Updated') }}</th>
            <th>{{ __('Action') }}</th>
        </x-slot:thead>
        <x-slot:tbody>
            @if (count($works) > 0)
                @foreach ($works as $i => $work)
                    <tr wire:key="{{$i}}">
                        <td>{{ $i += 1 }}</td>
                        <td>
                            <img class="d-block s-100 rounded-2 border border-light shadow-md"
                                src="{{ $work->image !== null
                                    ? asset('/storage/' . $work->image)
                                    : asset('imgs/projects/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqru2m0dJ.jpg') }}"
                                alt="alt">
                        </td>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->payment === 'Payed' ? $work->payment . ' - ' . $work->price . '$' : $work->payment }}
                        </td>
                        <td>
                            @if ($work->project_url)
                                <a href="{{ $work->project_url }}" target="__blank">{{ __('Live View') }}</a>
                            @endif
                        </td>
                        <td>
                            @if ($work->repo_url)
                                <a href="{{ $work->repo_url }}" target="__blank">{{ __('Repo') }}</a>
                            @endif
                        </td>
                        <td>{{ $work->category }}</td>
                        <td>{{ $work->tech_stack }}</td>
                        <td>
                            @if ($work->vedio)
                                <a href="{{ $work->vedio }}" target="__blank">{{ __('Demo') }}</a>
                            @endif
                        </td>
                        <td>
                            @if ($work->description)
                                <a id="descShow" href="#"
                                    data-description="{{ (string) $converter->convert($work->description) }}"
                                    data-bs-toggle="modal" title="Show Description" data-bs-target="#show-desc-modal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endif
                        </td>
                        <td>{{ $work->created_at->diffForHumans() }}</td>
                        <td>{{ $work->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn" title="Edit"
                                x-on:click="$dispatch('open-modal', {name: 'works-edit-modal'})"
                                wire:click.prevent="setProjectID({{ $work->id }})">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                            <button type="button" class="btn" title="Delete"
                                x-on:click="$dispatch('open-modal', {name: 'works-del-modal'})"
                                wire:click.prevent="setProjectID({{ $work->id }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="13">
                        <div class="alert alert-primary text-center" role="alert">
                            There is no <strong>Works</strong> Found!
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:tbody>
    </x-tables.search>

    {{ $works->links() }}

    {{-- Adding New Works Modal --}}
    <x-modal.def name="works-add-modal" title="Adding new work" class="modal-wider">
        <form wire:submit.prevent="save">
            {{-- Show 2 cols in larg screen & from medium to down show one col --}}
            <div class="row row-cols-1 row-cols-lg-3 g-3">
                {{-- Left Side --}}
                <div class="col-12 col-lg-3">
                    <div class="text-center">
                        <h5 class="mb-2">Choose Project Image</h5>
                        <input type="file" class="form-control mb-2" wire:model="image">
                        <span wire:loading class="text-success">loading...</span>
                        <img
                            src="{{ $image ? $image->temporaryUrl() : asset('imgs/projects/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqru2m0dJ.jpg') }}"
                            class="img-fluid rounded-3 mt-2 shadow-md border-2 border-light" 
                            alt="show"
                            accept="image/png, image/jpeg, image/jpg"
                        >
                    </div>
                </div>
                {{-- center Side --}}
                <div class="col-12 col-lg-4">
                    {{-- Project Title --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'title' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Name' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Category --}}
                    <x-forms.select>
                        <x-slot:for>{{ 'category' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Category' }}</x-slot:placeholder>
                        <option value="Template">{{ __('Template') }}</option>
                        <option value="Project">{{ __('Project') }}</option>
                        <option value="Photoshop">{{ __('Photoshop') }}</option>
                    </x-forms.select>
                    {{-- Payment Feild --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'payment' }}</x-slot:for>
                        <x-slot:title>{{ __('Project Payment') }}</x-slot:title>
                        <x-slot:values>{{ 'Free,Payed' }}</x-slot:values>
                        <div x-show="payed === 'Payed'" x-transition>
                            <x-forms.input>
                                <x-slot:type>{{ 'number' }}</x-slot:type>
                                <x-slot:for>{{ 'price' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Project Price' }}</x-slot:placeholder>
                            </x-forms.input>
                        </div>
                    </x-forms.radio>
                    {{-- Tech Technology --}}
                    <x-forms.textarea>
                        <x-slot:for>{{ 'tech_stack' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Technologies' }}</x-slot:placeholder>
                        <div class="row">
                            <span class="col-9 text-start" style="font-size: 13px"><em>Use Json style to right the tech
                                    stack</em></span>
                            <span class="col-3 text-end" style="font-size: 13px"><em>0/255</em></span>
                        </div>
                    </x-forms.textarea>
                </div>
                {{-- Right Side --}}
                <div class="col-12 col-lg-5">
                    {{-- Project Live Demo URL --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'project_url' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Live demo link' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Repo Like GitHub --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'repo_url' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Github link' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Video Like Youtube --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'vedio' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Vedio link' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Description --}}
                    <x-forms.desc-preview>
                        <div x-show="status === 'code'" x-transition>
                            <x-forms.textarea>
                                <x-slot:for>{{ 'description' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Project Description' }}</x-slot:placeholder>
                                <x-slot:modifier>{{ 'live.throttle.150ms' }}</x-slot:modifier>
                                <div class="row">
                                    <span class="col-9 text-start" style="font-size: 13px"><em>Use Commonmark style to
                                            right the description</em></span>
                                    <span class="col-3 text-end" style="font-size: 13px"><em>0/2000</em></span>
                                </div>
                            </x-forms.textarea>
                        </div>
                        <div x-show="status === 'preview'" x-transition>
                            <div class="preview" x-html="markdown"></div>
                        </div>
                    </x-forms.desc-preview>
                    {{-- Save Action --}}
                    <div class="text-end">
                        <button class="btn btn-outline-success">
                            <i class="fas fa-file"></i>
                            {{ __('Create Project') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-modal.def>

    {{-- Eidt Works Modal --}}
    <x-modal.def name="works-edit-modal" title="Editing work" class="modal-wider">
        <form wire:submit.prevent="update">
            {{-- Project ID --}}
            <x-forms.input>
                <x-slot:for>{{ 'project_id' }}</x-slot:for>
                <x-slot:type>{{ 'hidden' }}</x-slot:type>
                <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- One column in small screens and in large one show two columns --}}
            <div class="row row-cols-1 row-cols-lg-2 g-3">
                {{-- Left Side --}}
                <div class="col-12 col-lg-3">
                    <div class="text-center">
                        <h5 class="mb-2">Choose Project Image</h5>
                        <input type="file" class="form-control mb-2" wire:model="image">
                        <span wire:loading class="text-success">loading...</span>
                        <img 
                            src="{{ $image ? $image->temporaryUrl() : asset('/storage/' . $path) }}"
                            class="img-fluid rounded-3 mt-2 shadow-md border-2 border-light" 
                            alt="show"
                            accept="image/png, image/jpeg, image/jpg"
                            ac
                        >
                    </div>
                </div>
                {{-- Left Side --}}
                <div class="col-12 col-lg-4">
                    {{-- Project Title --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'title' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Name' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Category --}}
                    <x-forms.select>
                        <x-slot:for>{{ 'category' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Category' }}</x-slot:placeholder>
                        <option value="Template">{{ __('Template') }}</option>
                        <option value="Project">{{ __('Project') }}</option>
                        <option value="Photoshop">{{ __('Photoshop') }}</option>
                    </x-forms.select>
                    {{-- Payment Feild --}}
                    <x-forms.radio>
                        <x-slot:for>{{ 'payment' }}</x-slot:for>
                        <x-slot:title>{{ __('Project Payment') }}</x-slot:title>
                        <x-slot:values>{{ 'Free,Payed' }}</x-slot:values>
                        <div x-show="payed === 'Payed'" x-transition>
                            <x-forms.input>
                                <x-slot:type>{{ 'number' }}</x-slot:type>
                                <x-slot:for>{{ 'price' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Project Price' }}</x-slot:placeholder>
                            </x-forms.input>
                        </div>
                    </x-forms.radio>
                    {{-- Tech Technology --}}
                    <x-forms.textarea>
                        <x-slot:for>{{ 'tech_stack' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Technologies' }}</x-slot:placeholder>
                        <div class="row">
                            <span class="col-9 text-start" style="font-size: 13px"><em>Use Json style to right the tech
                                    stack</em></span>
                            <span class="col-3 text-end" style="font-size: 13px"><em>0/255</em></span>
                        </div>
                    </x-forms.textarea>
                </div>
                {{-- Right Side --}}
                <div class="col-12 col-lg-5">
                    {{-- Project Live Demo URL --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'project_url' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Live demo link' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Repo Like GitHub --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'repo_url' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Github link' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Video Like Youtube --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'vedio' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Vedio link' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Description --}}
                    <x-forms.desc-preview>
                        <div x-show="status === 'code'" x-transition>
                            <x-forms.textarea>
                                <x-slot:for>{{ 'description' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Project Description' }}</x-slot:placeholder>
                                <x-slot:modifier>{{ 'live.throttle.150ms' }}</x-slot:modifier>
                                <div class="row">
                                    <span class="col-9 text-start" style="font-size: 13px"><em>Use Commonmark style to
                                            right the description</em></span>
                                    <span class="col-3 text-end" style="font-size: 13px"><em>0/2000</em></span>
                                </div>
                            </x-forms.textarea>
                        </div>
                        <div x-show="status === 'preview'" x-transition>
                            <div class="preview" x-html="markdown"></div>
                        </div>
                    </x-forms.desc-preview>
                    {{-- Submit --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-outline-success s-100">
                            <i class="fas fa-edit me-1"></i>{{ __('Update') }}
                        </button>
                        <button type="button" wire:click="cancel" class="btn btn-outline-danger s-100">
                            <i class="fas fa-times me-1"></i>{{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-modal.def>

    {{-- Confirm Deleting Modal --}}
    <x-modal.def name="works-del-modal">
        <x-slot:type>{{ 'confirm' }}</x-slot:type>
    </x-modal.def>

    {{-- Confirm Deleting Modal --}}
    <x-modal.show-desc></x-modal.show-desc>

</div>
