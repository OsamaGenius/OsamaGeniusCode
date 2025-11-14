<div class="mb-3">
    <label for="" class="form-label"></label>
    <textarea class="form-control" wire.model.defer="{{ $for }}" placeholder="{{ $placeholder }}"
        style="min-height: 100px"></textarea>
    {{$slot}}
</div>
@error("$for")
    <em class="text-danger">{{ $message }}</em>
@enderror
