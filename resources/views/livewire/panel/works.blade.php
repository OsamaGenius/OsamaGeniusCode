<div x-data="{ 
        payed: @entangle('payment'),
        status: 'code'
    }" 
    class="py-5"
>

    {{-- Success & Failure Messages --}}
    <x-alerts.session></x-alerts.session>

    {{-- Works Data Table View --}}
    <x-tables.search>
        <x-slot:title>{{ __('Works Management Table') }}</x-slot:title>
        <x-slot:add>{{ '#works-add-modal' }}</x-slot:add>
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
                    <tr>
                        <td>{{ $i += 1 }}</td>
                        <td><img class="d-block s-150 rounded-2 border border-light shadow"
                                src="{{ asset('imgs/co01.png') }}" alt="alt"></td>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->payment === 'Payed' ? $work->payment . ' - ' . $work->price . '$' : $work->payment }}</td>
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
                                <a href="#"><i class="fas fa-eye"></i></a>
                            @endif
                        </td>
                        <td>{{ $work->created_at->diffForHumans() }}</td>
                        <td>{{ $work->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn" data-bs-toggle="modal" title="Edit"
                                data-bs-target="#project-edit-modal"
                                wire:click.prevent="setProjectID({{ $work->id }})">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" title="Delete"
                                data-bs-target="#deleteModal" wire:click.prevent="setProjectID({{ $work->id }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12">
                        <div class="alert alert-primary text-center" role="alert">
                            There is no <strong>Works</strong> Found!
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:tbody>
    </x-tables.search>

    {{-- Adding New Works Modal --}}
    <x-modal.def>
        <x-slot:id>{{ 'works-add-modal' }}</x-slot:id>
        <x-slot:title>{{ 'Adding new work' }}</x-slot:title>
        <x-slot:class>{{ 'modal-wider' }}</x-slot:class>
        <form wire:submit.prevent="save">
            {{-- Show 2 cols in larg screen & from medium to down show one col --}}
            <div class="row row-cols-1 row-cols-lg-2 g-3">
                {{-- Left Side --}}
                <div class="col-12 col-lg-5">
                    {{-- Project Title --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'title' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Name' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Category --}}
                    <x-forms.select>
                        <x-slot:for>{{ 'category' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Category' }}</x-slot:placeholder>
                        <option value="Template">{{__('Template')}}</option>
                        <option value="Project">{{__('Project')}}</option>
                        <option value="Photoshop">{{__('Photoshop')}}</option>
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
                        <span style="font-size: 13px"><em>Use Json style to right the tech stack</em></span>
                    </x-forms.textarea>
                </div>
                {{-- Right Side --}}
                <div class="col-12 col-lg-7">
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
                                <span style="font-size: 13px"><em>Use Commonmark style to right the
                                        description</em></span>
                            </x-forms.textarea>
                        </div>
                        <div x-show="status === 'preview'" x-transition>
                            <x-forms.textarea>
                                <x-slot:for>{{ 'preview' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Project Description View' }}</x-slot:placeholder>
                            </x-forms.textarea>
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
    <x-modal.def>
        <x-slot:id>{{ 'works-edit-modal' }}</x-slot:id>
        <x-slot:title>{{ 'Editing work' }}</x-slot:title>
        <x-slot:class>{{ 'modal-wider' }}</x-slot:class>
        <form>
            {{-- Project ID --}}
            <x-forms.input>
                <x-slot:for>{{ 'project_id' }}</x-slot:for>
                <x-slot:type>{{ 'hidden' }}</x-slot:type>
                <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- One column in small screens and in large one show two columns --}}
            <div class="row row-cols-1 row-cols-lg-2 g-3">
                {{-- Left Side --}}
                <div class="col-12 col-lg-5">
                    {{-- Project Title --}}
                    <x-forms.input>
                        <x-slot:for>{{ 'title' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Name' }}</x-slot:placeholder>
                    </x-forms.input>
                    {{-- Project Category --}}
                    <x-forms.select>
                        <x-slot:for>{{ 'category' }}</x-slot:for>
                        <x-slot:placeholder>{{ 'Project Category' }}</x-slot:placeholder>
                        <option value="Template">{{__('Template')}}</option>
                        <option value="Project">{{__('Project')}}</option>
                        <option value="Photoshop">{{__('Photoshop')}}</option>
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
                        <span style="font-size: 13px"><em>Use Json style to right the tech stack</em></span>
                    </x-forms.textarea>
                </div>
                {{-- Right Side --}}
                <div class="col-12 col-lg-7">
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
                                <span style="font-size: 13px"><em>Use Commonmark style to right the
                                        description</em></span>
                            </x-forms.textarea>
                        </div>
                        <div x-show="status === 'preview'" x-transition>
                            <x-forms.textarea>
                                <x-slot:for>{{ 'preview' }}</x-slot:for>
                                <x-slot:placeholder>{{ 'Project Description View' }}</x-slot:placeholder>
                            </x-forms.textarea>
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
    <x-modal.confirm>
        <x-slot:method>{{ 'delete' }}</x-slot:method>
    </x-modal.confirm>

</div>
