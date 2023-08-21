<div id="{{ $id }}" class="modal desicion-custom-modal">
    <form action="{{$action}}" method="POST">

        <div class="modal-content">
            <h4>{{ $title }}</h4>
            <p>{{ $text }}</p>
        </div>

        @csrf

        <input type="hidden" id="uuid" name="uuid" value="{{$value}}">

        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn acept">
                <i class="material-icons left">done</i>
                Aceptar
            </button>
            <a href="#!" class="waves-effect waves-light btn cancel modal-close">
                <i class="material-icons left">close</i>
                Cancelar
            </a>
        </div>

    </form>
</div>
