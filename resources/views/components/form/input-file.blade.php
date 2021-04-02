<div class="mb-3">
    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
    <input class="form-control @error($field) is-invalid @enderror" type="file" id="{{ $field }}" name="{{ $field }}">
    @error($field)
        <div class="invalid-feedback my-1">{{ Str::ucfirst($message) }}</div>
    @enderror
</div>
