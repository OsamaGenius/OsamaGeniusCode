<div x-data="{
    add: @entangle('add'),
    show: @entangle('show'),
    status: @entangle('status'),
    review: @entangle('review')
}">

    <h3 class="mb-3">{{ __('Manage Story Details') }}</h3>

    <div class="btn-group">
        <button class="btn btn-outline-success" x-on:click="add = !add; show = false;">
            <i class="fas fa-plus me-1"></i>
            {{ __('Add Story') }}
        </button>
        <button class="btn btn-outline-danger" x-on:click="show = !show; add = false;">
            <i class="fas fa-eye me-1"></i>
            {{ __('Show Stories') }}
        </button>
    </div>

    <div class="p-3 rounded-3 bg-white shadow-md mt-2" x-cloak x-show="add" x-transition>
        {{-- Nav tabs --}}
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="code-tab" data-bs-toggle="tab" data-bs-target="#code"
                    type="button" role="tab" aria-controls="code"
                    aria-selected="true">{{ __('Add Story') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview" type="button"
                    role="tab" aria-controls="preview" aria-selected="false">{{ __('Preview Demo') }}</button>
            </li>
        </ul>

        {{-- Tab panes --}}
        <div class="tab-content">

            <div class="tab-pane active" id="code" role="tabpanel" aria-labelledby="code-tab">
                <x-forms.textarea>
                    <x-slot:for>{{ 'story' }}</x-slot:for>
                    <x-slot:placeholder>{{ 'Short story about OsamaGenius Write / Paste' }}</x-slot:placeholder>
                    <x-slot:modifier>{{ 'live.throttle.150ms' }}</x-slot:modifier>
                </x-forms.textarea>
                <em class="d-block w-100">{{ __('Use common mark down style to right the about details') }}</em>
                {{-- Action Buttons --}}
                <div class="text-end">
                    {{-- Save new --}}
                    <button class="btn btn-outline-success" x-cloak x-show="status" x-transition
                        wire:click.prevent="save">
                        <i class="fas fa-file me-1"></i>{{ __('Save') }}
                    </button>
                    {{-- Edit --}}
                    <div class="btn-group" x-cloak x-show="!status" x-transition>
                        <button class="btn btn-outline-success" wire:click.prevent="update">
                            <i class="fas fa-edit me-2"></i>{{ __('Edit') }}
                        </button>
                        <button class="btn btn-outline-danger" wire:click.prevent="cancel">
                            <i class="fas fa-times me-2"></i>{{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="preview" role="tabpanel" aria-labelledby="preview-tab">
                <div class="preview" x-html="review"></div>
            </div>

        </div>
    </div>

    <div class="p-3 rounded-3 bg-white shadow-md mt-2" x-cloak x-show="show" x-transition>
        <div class="table-responsive">
            <table class="table table-borderless align-middle text-center">
                <thead class="table-light text-center">
                    <caption class="text-center">{{ __('About Details Preview') }}</caption>
                    <tr class="border-bottom">
                        <th>{{ '#' }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Created') }}</th>
                        <th>{{ __('Updated') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if (count($data))
                        @foreach ($data as $i => $item)
                            <tr class="border-bottom">
                                <td scope="row">{{ $i += 1 }}</td>
                                <td>{{ Illuminate\Support\Str::substr($item->title, 0, 50) . '...' }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn" title="Edit"
                                        wire:click.prevent="setPreview({{ $item->id }})">
                                        <i class="fas fa-edit text-primary"></i>
                                    </button>
                                    <button type="button" class="btn" data-bs-toggle="modal" title="Delete"
                                        wire:click.prevent="deleteID({{ $item->id }})"
                                        wire:confirm="Are you sure you want to delete this record"
                                    >
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-info" role="alert">
                                    <strong>Details</strong> not founded
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $data->links() }}
        </div>

    </div>

    {{-- Confirm Deleting Modal --}}
    <x-modal.confirm>
        <x-slot:method>{{ 'delete' }}</x-slot:method>
    </x-modal.confirm>

</div>
