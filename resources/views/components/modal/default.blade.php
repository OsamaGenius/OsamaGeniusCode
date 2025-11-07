<div wire:ignore.self class="modal fade" id="social-bs-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">{{ __('Social Links Management') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="">
                        {{-- Socail link ID --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="ide" placeholder="ID" disabled>
                        </div>
                        {{-- Socail link name --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model.defer="name"
                                placeholder="Ex: Facebook">
                            <label for="name">{{ __('Ex: Facebook') }}</label>
                            @error('name')
                                <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        {{-- Socail link URL --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model.defer="url"
                                placeholder="Ex: Https:www.facebook.com/user_name">
                            <label for="url">{{ __('Ex: Https:www.facebook.com/user_name') }}</label>
                            @error('url')
                                <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        {{-- Social Link Status --}}
                        <div class="mb-3">
                            <h6>{{ __('Scoial Link Status') }}</h6>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="status" id="option1"
                                    value="Active">
                                <label class="form-check-label" for="option1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="status" id="option2"
                                    value="Disabled">
                                <label class="form-check-label" for="option2">Disabled</label>
                            </div>
                            @error('status')
                                <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>

                    </form>

                </div>
            </div>
            <div class="modal-footer">
                {{-- Submit --}}
                <div class="text-end">
                    <button x-cloak x-show="edit === false" x-transition type="button"
                        class="btn btn-outline-primary s-100" wire:click.prevent='save'>
                        <i class="fas fa-save me-1"></i>{{ __('Save') }}
                    </button>
                    <div class="btn-group" x-cloak x-show="edit === true" x-transition>
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
                </div>
            </div>
        </div>
    </div>
</div>
