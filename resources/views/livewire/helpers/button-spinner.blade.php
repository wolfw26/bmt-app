<button type="{{ $type }}" class="btn {{ $class }} w-100 mt-4 mb-0 @if ($isDisabled) disabled @endif" wire:loading.attr="disabled">
    <span wire:loading.remove>{{ $label }}</span>
    <span wire:loading>
        <div class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </span>
</button>

{{-- <div class="text-center">
    <button  type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0 @if (strlen($password) < 6) disabled @endif "wire:loading.attr="disabled">
        <span wire:loading.remove>Log in</span>
        <span wire:loading>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </span>
    </button>
</div> --}}
