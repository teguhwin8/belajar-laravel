<div class="mb-3">
    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" rows="5" name="{{ $field }}">@isset($value){{old($field)?old($field):$value}}@else{{old($field)}}@endisset</textarea>
    @error($field)
        <div class="invalid-feedback my-1">{{ Str::ucfirst($message) }}</div>
    @enderror
</div>
