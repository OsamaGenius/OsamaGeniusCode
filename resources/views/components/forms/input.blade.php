@props(['disabled'])
<div class="form-floating mb-3">
    <input 
        type="{{$type ?? 'text'}}" 
        class="form-control rounded-5 bg-inherit" 
        min="0"
        accept="image/png, image/jpeg, image/jpg"
        wire:model.{{$modifier ?? 'defer'}}="{{$for}}" 
        placeholder="{{$placeholder}}"
        value="{{$value ?? ''}}"
        {{$disabled ?? ''}}
    >
    <label for="{{$for}}">{{$placeholder}}</label>
    {{$slot}}
    @error("$for")
        <em class="text-danger">{{ $message }}</em>
    @enderror
</div>
