<select name="{{ $name }}" class="form-control" @if(isset($isRequired)) required @endif>
    {{ $slot }}
    @if(isset($options))
        @foreach($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['display'] }}</option>
        @endforeach
    @endif
</select>