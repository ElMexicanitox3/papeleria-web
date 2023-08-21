@php
    $color = $color ?? 'blue'; // Valor por defecto 'blue' si no se proporciona 'color'
    $icon = $icon ?? 'add'; // Valor por defecto 'add' si no se proporciona 'icon'
    $text = $text ?? ''; // Valor por defecto 'Nuevo' si no se proporciona 'text'
    $mesagge_tootip = $mesagge_tootip ?? ''; // Valor por defecto 'Nuevo registro' si no se proporciona 'mesagge_tootip'
    $href = $href ?? '#'; // Valor por defecto '#' si no se proporciona 'href'
    $modaltrigger = $modaltrigger ?? ''; // Valor por defecto '' si no se proporciona 'modal-trigger'
@endphp


<a href="{{$href}}{{$modaltrigger}}" class="btn btn-small waves-effect waves-light {{$color}} <?php echo ($mesagge_tootip != "" ? "tooltipped" : "") ?>  <?php echo ($modaltrigger != "" ? "modal-trigger" : "") ?>" data-position="top" data-tooltip="{{$mesagge_tootip}}"><i class="material-icons">{{$icon}}</i>{{$text}}</a>
