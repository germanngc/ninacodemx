@props(['id', 'label', 'name', 'placeholder', 'required' => false, 'value' => ''])
<div {{ $attributes->merge(['class' => ''])->only(['class']) }} id="{{ $id }}Container">
    <label class="font-semibold sr-only">{{ $label }}</label>
    <input class="border-gray-300 px-2 py-1 rounded w-full" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} type="text" wire:defer="{{ $name }}" />
    <span class="bold text-xs text-red-500">@if($errors->has($name)){{ $errors->first($name) }}@endif</span>
</div>