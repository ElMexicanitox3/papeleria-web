<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Home')

<!-- Contenido -->
@section('content')
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center blue-text">Continuamos Trabajando</h1>
            <div class="row center">
                <h5 class="header col s12 light">Continuamos Trabajando para darte la mejor experiencia</h5>
            </div>
            <div class="row center">
                <a href="{{ route('dashboard') }}" id="download-button"
                    class="btn-large waves-effect waves-light blue">Dashboard</a>
            </div>
            <br><br>
        </div>
    </div>
    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">insights</i></h2>
                        <h5 class="center">Historial de precios</h5>

                        <p class="light center">¡Encuentra los Mejores Precios en un Solo Lugar!</p>
                        <p class="light">
                            Compara precios de tus productos favoritos en diversas sucursales con nuestra potente
                            herramienta de comparación. ¡Ahorra tiempo y dinero con un solo clic! Ya no tendrás que recorrer
                            diferentes tiendas; nuestro sistema te muestra las mejores ofertas al instante</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">groups</i></h2>
                        <h5 class="center">Opiniones</h5>
                        <p class="light center">¡Explora el Poder de las Opiniones Compartidas!</p>
                        <p class="light">
                            Descubre lo que otros piensan sobre productos, tiendas y mucho más con nuestro exclusivo sistema
                            de comparación de opiniones. ¿Buscas recomendaciones genuinas y valiosas? Navega a través de las
                            experiencias compartidas por usuarios reales. Obtén insights auténticos y toma decisiones más
                            acertadas. </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Inventario</h5>
                        <p class="light center">
                            ¡Controla tu Inventario y Ventas con Nuestra Herramienta de Gestión!
                        </p>
                        <p class="light">
                            Dale a tu negocio la ventaja que necesita con nuestra herramienta de gestión. Lleva un control
                            meticuloso de tu inventario y realiza un seguimiento detallado de tus ventas. Nuestra plataforma
                            está diseñada para empresas que buscan eficiencia y crecimiento.</p>
                    </div>
                </div>
            </div>

        </div>
        <br><br>
    </div>
@endsection
<!-- Final del contenido -->
