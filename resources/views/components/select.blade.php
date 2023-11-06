@props(['options' => [], 'name', 'label' => null, 'multiple' => false])

<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<select
    {{ $attributes->merge(['class' => 'mt-1 block w-full form-select transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
    @if ($multiple) multiple @endif>
    @if ($multiple)
        @foreach ($options as $value => $option)
            <option value="{{ $value }}">{{ $option }}</option>
        @endforeach
    @else
        @foreach ($options as $option)
            <option>{{ $option }}</option>
        @endforeach
    @endif
</select>
