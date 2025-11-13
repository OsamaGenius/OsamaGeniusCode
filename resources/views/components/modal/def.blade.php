<div wire:ignore.self class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content {{$class ?? ''}}">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>
