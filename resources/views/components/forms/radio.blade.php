<div class="mb-3">
    <h6>{{ $title }}</h6>
    @php
        $radios = explode(',', $values);
    @endphp
    @foreach ($radios as $i => $val)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" wire:model.defer="{{$for}}" id="{{$for . '_' . $i}}" value="{{$val}}">
            <label class="form-check-label" for="{{$for . '_' . $i}}">{{$val}}</label>
        </div>
    @endforeach
    @error("$for")
        <em class="text-danger">{{ $message }}</em>
    @enderror
</div>
