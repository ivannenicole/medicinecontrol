@props(['status'])

@if ($status)
    {{-- <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div> --}}
    <div class="alert alert-success" role="alert">
        {{ $status }}
    </div>
@endif
