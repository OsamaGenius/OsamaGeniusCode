@php
    $radios = explode(',', $values);
@endphp
<div class="mb-3">
    <h6>{{ $title }}</h6>
    <div class="d-flex">
        @foreach ($radios as $i => $val)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" wire:model.defer="{{ $for }}" value="{{ $val }}">
                <label class="form-check-label">{{ $val }}</label>
            </div>
        @endforeach
        {{ $slot }}
    </div>
    @error("$for")
        <em class="text-danger">{{ $message . 'Message' }}</em>
    @enderror
</div>
