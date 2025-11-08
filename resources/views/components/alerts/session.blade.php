<div x-data x-show="$store.alert.show" x-transition class="position-fixed top-right z-index-top">

    <div 
        :class="{
            'alert alert-success': $store.alert.type === 'success',
            'alert alert-danger': $store.alert.type === 'error',
        }"
        role="alert"
    >
        <button type="button" class="btn-close" x-on:click="$store.alert.show = false"></button>
        <b x-text="$store.alert.message"></b>
    </div>
</div>
