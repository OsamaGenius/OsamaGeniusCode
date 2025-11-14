<div>
    <ul class="nav nav-tabs w-100">
        <li class="nav-item">
            <a href="#" class="nav-link" :class="status === 'code' ? 'active' : ''" aria-current="page" x-on:click.prevent="status = 'code'">Code</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" :class="status === 'preview' ? 'active' : ''" x-on:click.prevent="status = 'preview'">Preview</a>
        </li>
    </ul>
    {{$slot}}
</div>
