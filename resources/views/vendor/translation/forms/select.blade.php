<div class="select-group">

    <select name="{{ $name }}" @if(isset($submit) && $submit) onchange="this.form.submit()" @endif>
        @if(isset($optional) && $optional)<option value> ----- </option>@endif
        @foreach($items as $key => $value)
            @if(is_numeric($key))
                <option value="{{ $value }}" @if(isset($selected) && $selected === $value) selected="selected" @endif>{{ $value }}</option>
            @else
                <option value="{{ $key }}" @if(isset($selected) && $selected === $key) selected="selected" @endif>{{ $value }}</option>
            @endif

            {{-- @php
                $locale = \Illuminate\Support\Facades\Session::get('currentLocale');
            @endphp

            @if(is_numeric($key))
                <option value="{{ $value }}" @if(isset($locale) && $locale === $value) selected="selected" @endif>{{ $value }}</option>
            @else
                <option value="{{ $key }}" @if(isset($locale) && $locale === $key) selected="selected" @endif>{{ $value }}</option>
            @endif --}}
        @endforeach
    </select>

    <div class="caret">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>

</div>
