<div class="input-field">
    <select name="{{ $name }}" id="{{ $name }}">
        {{-- si no hay defaultvalue seleccionamos la opcion de default --}}
        <option value="" disabled @if($defaultvalue == "") selected @endif>{{ $defaultoption }}</option>
        <?php if (isset($options)): ?>
            @foreach ($options as $option)
                <option value="{{ $option->uuid }}" {{ old($name, $defaultvalue) == $option->uuid ? 'selected' : '' }}>{{ $option->name }}</option>
            @endforeach
        <?php endif; ?>
    </select>
    <label>{{ $label }}</label>
    @error($name)
        <div class="red-text">{{ $message }}</div>
    @enderror
</div>
