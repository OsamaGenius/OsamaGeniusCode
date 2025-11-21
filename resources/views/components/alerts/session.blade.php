<div x-data x-show="$store.alert.show" x-transition class="position-fixed top-right z-index-top">

    <div 
        class="alert"
        :class="$store.alert.type === 'success' ? 'alert-success' : 'alert-danger'"
        role="alert"
    >
        <b x-text="$store.alert.message"></b>
        <button type="button" class="btn-close" x-on:click="$store.alert.show = false"></button>
    </div>
</div>
