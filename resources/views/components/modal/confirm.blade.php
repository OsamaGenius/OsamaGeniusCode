<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">{{ __('Delete Confirmation?') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <b>{{__('Are you sure you want to delete the selected item')}}</b>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" wire:click="resetInputs">
                    <i class="fas fa-times me-1"></i>{{__('Cancel')}}
                </button>
                <button type="button" class="btn btn-outline-success" wire:click="{{$method}}">
                    <i class="fas fa-trash me-1"></i>{{__('Delete')}}
                </button>
            </div>
        </div>
    </div>
</div>
