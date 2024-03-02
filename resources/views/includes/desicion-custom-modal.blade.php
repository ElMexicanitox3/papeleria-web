<?php
    $id = $id ?? 'modal1';
    $title = $title ?? 'Modal Title';
    $text = $text ?? 'Modal Text';
    $action = $action ?? '#';
    $value = $value ?? '';
?>

<!-- Modal -->
<div class="modal fade" id="{{$id}}" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{$action}}" method="post">
                @csrf
                <input type="hidden" id="uuid" name="uuid" value="{{$value}}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$title}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$text}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
