@php
    $color = $color ?? 'primary'; // Valor por defecto 'blue' si no se proporciona 'color'
    $icon = $icon ?? 'add'; // Valor por defecto 'add' si no se proporciona 'icon'
    $text = $text ?? ''; // Valor por defecto 'Nuevo' si no se proporciona 'text'
    $mesagge_tootip = $mesagge_tootip ?? ''; // Valor por defecto 'Nuevo registro' si no se proporciona 'mesagge_tootip'
    $href = $href ?? '#'; // Valor por defecto '#' si no se proporciona 'href'
    $modaltrigger = $modaltrigger ?? ''; // Valor por defecto '' si no se proporciona 'modal-trigger'
    $alingicon = $alingicon ?? ''; // Valor por defecto '' si no se proporciona 'alingicon'
@endphp

<span data-bs-toggle="modal" data-bs-target="#{{$modaltrigger}}" >
    <a data-bs-toggle="tooltip" data-bs-title="{{$mesagge_tootip}}" href="{{$href}}{{$modaltrigger}}" class="btn btn-outline-{{$color}}  <?php echo ($modaltrigger != "" ? "modal-trigger" : "") ?>" ><i class="material-icons {{$alingicon}}">{{$icon}}</i>{{$text}}</a>
</span>