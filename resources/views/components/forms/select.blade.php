<div class="mb-3">
    <label for="{{$for}}" class="form-label">{{$placeholder}}</label>
    <select class="form-select form-select-lg" wire:model.defer="{{$for}}">
        <option selected>Select one</option>
        {{$slot}}
    </select>
    @error("$for")
        <em class="text-danger">{{ $message }}</em>
    @enderror
</div>
