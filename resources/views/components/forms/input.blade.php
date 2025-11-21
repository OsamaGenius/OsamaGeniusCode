<div class="form-floating mb-3">
    <input 
        type="{{$type ?? 'text'}}" 
        class="form-control" 
        min="0"
        accept="image/png, image/jpeg, image/jpg"
        wire:model.{{$modifier ?? 'defer'}}="{{$for}}" 
        placeholder="{{$placeholder}}"
    >
    <label for="{{$for}}">{{$placeholder}}</label>
    @error("$for")
        <em class="text-danger">{{ $message }}</em>
    @enderror
</div>
