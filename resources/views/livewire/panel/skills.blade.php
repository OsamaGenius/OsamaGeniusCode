<div class="py-5">

    {{-- Import Mesages --}}
    <x-alerts.session></x-alerts.session>

    {{-- Import Table --}}
    <x-tables.search>
        {{-- <x-slot:add>{{ '#skills-add-modal' }}</x-slot:add> --}}
        <x-slot:add>{{ 'skills-add-modal' }}</x-slot:add>
        <x-slot:title>{{ __('Skills Management Table') }}</x-slot:title>
        <x-slot:thead>
            <th>{{ __('#') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Percentage') }}</th>
            <th>{{ __('Level') }}</th>
            <th>{{ __('Type') }}</th>
            <th>{{ __('Added') }}</th>
            <th>{{ __('Updated') }}</th>
            <th>{{ __('Action') }}</th>
        </x-slot:thead>
        <x-slot:tbody>
            @if (count($skills) > 0)
                @foreach ($skills as $i => $skill)
                    <tr wire:key="{{ $skill->id }}">
                        <td scope="row">{{ $i += 1 }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>
                            <div class="skills">
                                <div class="position-relative">
                                    <label class="progress-label">{{ $skill->percentage }}</label>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar"
                                            aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="pe-1 text-end">{{ $skill->percentage }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span
                                class="px-3 py-2 rounded-4 shadow {{ $skill->level === 'Expert'
                                    ? 'text-bg-danger'
                                    : ($skill->level === 'Intermediate'
                                        ? 'text-bg-success'
                                        : 'text-bg-warning') }}">
                                {{ $skill->level }}
                            </span>
                        </td>
                        <td>{{ $skill->type }}</td>
                        <td>{{ $skill->created_at->diffForHumans() }}</td>
                        <td>{{ $skill->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn" title="Edit"
                                x-on:click="$dispatch('open-modal', {name: 'skills-edit-modal'})"
                                wire:click.prevent="setSocialID({{ $skill->id }})">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                            <button type="button" class="btn" title="Delete"
                                x-on:click="$dispatch('open-modal', {name: 'skills-del-modal'})"
                                wire:click.prevent="setSocialID({{ $skill->id }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">
                        <div class="alert alert-primary text-center" role="alert">
                            There is no <strong>Skills</strong> found!
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:tbody>
    </x-tables.search>

    {{ $skills->links() }}

    {{-- Import Adding Modal --}}
    <x-modal.def name="skills-add-modal" title="Adding new skills">
        <form wire:submit.prevent="save">
            {{-- Skill Name --}}
            <x-forms.input>
                <x-slot:for>{{ 'name' }}</x-slot:for>
                <x-slot:placeholder>{{ 'Ex: PHP | Laravel | HTML' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Skill Percentage --}}
            <x-forms.input>
                <x-slot:type>{{ 'number' }}</x-slot:type>
                <x-slot:for>{{ 'percentage' }}</x-slot:for>
                <x-slot:modifier>{{ 'live' }}</x-slot:modifier>
                <x-slot:placeholder>{{ '50 <->100 [Only numbers]' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Skills Level --}}
            <x-forms.radio>
                <x-slot:for>{{ 'level' }}</x-slot:for>
                <x-slot:title>{{ __('Skill Level') }}</x-slot:title>
                <x-slot:values>{{ 'Beginner,Intermediate,Expert' }}</x-slot:values>
            </x-forms.radio>
            {{-- Skills Type --}}
            <x-forms.radio>
                <x-slot:for>{{ 'type' }}</x-slot:for>
                <x-slot:title>{{ __('Skill Type') }}</x-slot:title>
                <x-slot:values>{{ 'Frontend,Backend' }}</x-slot:values>
            </x-forms.radio>
            {{-- Submit --}}
            <div class="text-end">
                <button type="submit" class="btn btn-outline-primary s-100">
                    <i class="fas fa-save me-1"></i>{{ __('Save') }}
                </button>
            </div>
        </form>
    </x-modal.def>

    {{-- Import Editing Modal --}}
    <x-modal.def name="skills-edit-modal" title="Editing skills">
        <form wire:submit.prevent="update">
            {{-- Skill ID --}}
            <x-forms.input>
                <x-slot:type>{{ 'hidden' }}</x-slot:type>
                <x-slot:for>{{ 'skill_id' }}</x-slot:for>
                <x-slot:placeholder>{{ '' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Skill Name --}}
            <x-forms.input>
                <x-slot:for>{{ 'name' }}</x-slot:for>
                <x-slot:placeholder>{{ 'Ex: PHP | Laravel | HTML' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Skill Percentage --}}
            <x-forms.input>
                <x-slot:type>{{ 'number' }}</x-slot:type>
                <x-slot:for>{{ 'percentage' }}</x-slot:for>
                <x-slot:modifier>{{ 'live' }}</x-slot:modifier>
                <x-slot:placeholder>{{ '50 <->100 [Only numbers]' }}</x-slot:placeholder>
            </x-forms.input>
            {{-- Skills Level --}}
            <x-forms.radio>
                <x-slot:for>{{ 'level' }}</x-slot:for>
                <x-slot:title>{{ __('Skill Level') }}</x-slot:title>
                <x-slot:values>{{ 'Beginner,Intermediate,Expert' }}</x-slot:values>
            </x-forms.radio>
            {{-- Skills Type --}}
            <x-forms.radio>
                <x-slot:for>{{ 'type' }}</x-slot:for>
                <x-slot:title>{{ __('Skill Type') }}</x-slot:title>
                <x-slot:values>{{ 'Frontend,Backend' }}</x-slot:values>
            </x-forms.radio>
            {{-- Submit --}}
            <div class="text-end">
                <button type="submit" class="btn btn-outline-primary s-100">
                    <i class="fas fa-save me-1"></i>{{ __('Update') }}
                </button>
                <button type="button" wire:click.prevent="cancel" class="btn btn-outline-danger s-100">
                    <i class="fas fa-times me-1"></i>{{ __('Cancel') }}
                </button>
            </div>
        </form>
    </x-modal.def>

    {{-- Import Confirming Modal --}}
    {{-- <x-modal.confirm>
        <x-slot:method>{{ 'delete' }}</x-slot:method>
    </x-modal.confirm> --}}
    <x-modal.def name="skills-del-modal" title="Confirm Deletion">
        <x-slot:type>{{ 'confirm' }}</x-slot:type>
    </x-modal.def>

    <script defer>
        const
            pgLab = document.querySelectorAll('.progress-label'),
            progress = document.querySelectorAll('.progress .progress-bar');

        function fillProgressBars() {
            progress.forEach((bar, i) => {
                let valnow = bar.getAttribute('aria-valuenow'); // Fetch current progress value
                if (valnow >= 80) {
                    fillProgressBarAnimation(bar, 'bg-success', valnow); // Animate fills from 0 to current value
                    setupProgressBarLabel(bar, pgLab[i], 'bg-success'); // Config progress bar label
                } else if (valnow >= 50) {
                    fillProgressBarAnimation(bar, 'bg-warning', valnow);
                    setupProgressBarLabel(bar, pgLab[i], 'bg-warning');
                    progress[i].style.color = '#333';
                } else {
                    fillProgressBarAnimation(bar, 'bg-danger', valnow);
                    setupProgressBarLabel(bar, pgLab[i], 'bg-danger');
                }
                bar.addEventListener('mouseenter', function() { // Show label on hover
                    pgLab[i].classList.add('op-none');
                    pgLab[i].classList.add('progress-label-bounce');
                });
                bar.addEventListener('mouseleave', function() { // hide label on exit
                    pgLab[i].classList.remove('op-none');
                    pgLab[i].classList.remove('progress-label-bounce');
                });
            });
        }


        function setupProgressBarLabel(value, label, bg = 'bg-primary') {
            // Move the label to last filled point of the progress bar [like: 90%]
            label.style.left = value.getAttribute('aria-valuenow') + '%';
            label.classList.add(bg); // Adding bg color class name to the label
            if (bg === 'bg-warning') {
                label.style.color = '#333'; // Set text color to black
            } else {
                label.style.color = '#fff'; // Set text color to white
            }
        }

        function fillProgressBarAnimation(target, bg = 'bg-primary', value = '50') {
            target.classList.add(bg); // Adding bg class name to the progress bar
            target.style.width = '0%'; // Set the width of progress bar to zero
            setTimeout(() => { // Animate: filling the progress bar width accordding to the value 
                target.style.width = value + '%';
            }, 700);
        }

        fillProgressBars();
    </script>

</div>
