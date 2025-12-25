@props(['title' => 'save', 'icon' => 'save'])
<div class="d-inline-block">
    
    <button 
        type="submit" 
        class=
            "
                btn 
                @if($title === 'Cancel' || $title === 'cancel' || $title === 'Delete' || $title === 'delete')
                    btn-outline-danger 
                @else 
                    btn-outline-primary 
                @endif 
            "
        @if($title === 'Cancel' || $title === 'cancel') 
            wire:click.prevent="cancel" 
        @endif
        @if($title === 'Delete' || $title === 'delete') 
            wire:click.prevent="delete" 
        @endif
        >

        <i 
            class="fas fa-spinner fa-spin"
            wire:loading
        >
        </i>

        <i class="fas fa-{{$icon}} me-1"></i>

        {{ $title }}

    </button>

</div>