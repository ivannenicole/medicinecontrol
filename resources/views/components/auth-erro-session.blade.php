@props(['erro'])

@if ($erro)
    {{-- <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div> --}}
    <div class="alert alert-danger" role="alert">
        {{ $erro }}
    </div>
@endif
