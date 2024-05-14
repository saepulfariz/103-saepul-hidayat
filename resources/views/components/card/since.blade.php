@props(['percentage', 'slot'])
<p class="mb-0">
    <span {{ $attributes }}>{{ $percentage }}</span>
    {{ $slot }}
</p>
