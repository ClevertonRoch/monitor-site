@props(['id' => null, 'name', 'type' => 'text', 'value' => null, 'placeholder' => ''])

<input {{ $attributes->merge(['class' => 'block w-full mt-1 rounded-md border-gray-300
shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:text-gray-900']) }}
id="{{ $id }}"
name="{{ $name }}"
type="{{ $type }}"
value="{{ $value }}"
placeholder = "{{ $placeholder }}"
/>
