<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'MedicineControl')
<img src="{{ asset('assets/first-aid-kit.png') }}" class="logo" alt="MedicineControl Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
