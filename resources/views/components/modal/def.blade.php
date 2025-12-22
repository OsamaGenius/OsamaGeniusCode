@props(['name', 'title' => 'Confirm Deletion', 'type' => '', 'class'])
<div 
    x-data="{ 
        visible: false,
        name: '{{ isset($name) ? $name : '' }}'
    }" 
    x-cloak
    x-show="visible" 
    x-on:open-modal.window="visible = ($event.detail.name === name)"
    x-on:close-modal.window="visible = false"
    x-on:keydown.escape.window="visible = false"
>

    <div class="modal-holder" wire:ignore.self>

        <div class="backbone" x-on:click="visible = false"></div>

        <div class="modal-content bg-light rounded-3 py-2 px-3 mt-5 {{ isset($class) ? $class : '' }}">

            @if (isset($title))
                <div class="modal-header py-2 border-bottom">
                    <div class="header-title">
                        {{ $title }}
                    </div>
                    <div class="header-icon" x-on:click="visible = false"><i class="fas fa-times"></i></div>
                </div>
            @endif

            <div class="modal-body py-2">
                @if ($type == 'confirm')
                    <b>{{__('Are you sure you want to delete the selected item')}}</b>       
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-outline-danger" wire:click="cancel">
                            <i class="fas fa-times me-1"></i>{{__('Cancel')}}
                        </button>
                        <button type="button" class="btn btn-outline-success" wire:click="delete">
                            <i class="fas fa-trash me-1"></i>{{__('Delete')}}
                        </button>
                    </div>         
                @else
                    {{ $slot }}
                @endif
            </div>

        </div>

    </div>

</div>
