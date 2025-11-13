<div>
    <ul class="nav nav-tabs w-100">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">Code</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Preview</a>
        </li>
    </ul>
    <x-forms.textarea>
        <x-slot:for>{{ 'description' }}</x-slot:for>
        <x-slot:placeholder>{{ 'Project Description' }}</x-slot:placeholder>
        <span style="font-size: 13px"><em>Use Commonmark style to right the
                description</em></span>
    </x-forms.textarea>
</div>
