<div class="mb-3">
    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" @isset($value) value="{{ old($field) ? old($field) : $value }}" @else value="{{ old($field) }}" @endisset>
    @error($field)
        <div class="invalid-feedback my-1">{{ Str::ucfirst($message) }}</div>
    @enderror
</div>
