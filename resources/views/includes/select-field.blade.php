<div class="input-field">
    <select name="{{ $name }}" id="{{ $name }}">
        <option value="" disabled>{{ $defaultoption }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->uuid }}" {{ old($name, $defaultvalue) == $option->uuid ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
    </select>
    <label>{{ $label }}</label>
    @error($name)
        <div class="red-text">{{ $message }}</div>
    @enderror
</div>
