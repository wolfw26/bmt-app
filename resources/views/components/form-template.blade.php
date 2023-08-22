<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    {{ $slot }}
</form>


{{-- <x-form-template :action="route('submit.form')" method="POST">
    Konten Form
</x-form-template> --}}
