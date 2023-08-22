@foreach ($inputData as $input )
<div>
    <label for="{{ $inpute['id'] }}">{{ $input['label'] }}</label>
    <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" id="{{ $input['id'] }}">
</div>
@endforeach


{{-- @php
    $inputData = [
        ['label' => 'Name 1', 'type' => 'text', 'name' => 'name1', 'id' => 'name1'],
        ['label' => 'Name 2', 'type' => 'text', 'name' => 'name2', 'id' => 'name2'],
        ... tambahkan konfigurasi form input lainnya sesuai kebutuhan Anda
    ];
@endphp

<x-dynamic-form :inputData="$inputData" /> --}}

