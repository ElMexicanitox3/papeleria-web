<div class="input-field">
    <input id="{{$name}}" type="text" name="{{$name}}" class="validate" value="{{ old($name) }}" autocomplete="{{$name}}" autofocus>
    <label for="{{$name}}">{{$label}}</label>
    @error($name)
        <div class="red-text">*{{ $message }}</div>
    @enderror
</div>
