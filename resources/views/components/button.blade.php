<button {{ $attributes->merge(['class' => 'btn']) }} type="{{ $type }}" class="btn btn-{{ $type }}">
    {{ $label }}
</button>

<!-- <x-button class="btn-secondary btn-outline" type="submit" label="Submit Form" /> -->
