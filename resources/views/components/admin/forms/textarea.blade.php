<div {{ $attributes->merge(['class' => 'md:col-span-2 lg:col-span-1 w-full'])->only(['class']); }}>
    <label class="block pb-2" {{ $attributes->only(['id']) }}>{{ $attributes->get('label') }}</label>
    <textarea class="px-2 rounded-sm w-full" {{ $attributes->except(['class', 'label', 'model']) }}></textarea>
    @php $model = str_replace('"', '', explode("=", $attributes->only(['wire:model']))[1]); @endphp
    @error($model) <span class="error text-xs text-red-500" id="error{{ $model }}">{{ $message }}</span> @enderror 
</div>