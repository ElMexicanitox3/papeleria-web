<!-- Plantilla -->
@extends('layouts.public')

<!-- Titulo -->
@section('title', 'Home')

<!-- Contenido -->
@section('content')

    <div class="container text-center mt-5">
        <div class="row">
            <div class="col col-12 col-sm-12 col-lg-12">
                <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 200px;">
                <h1 class="fw-bold ptxt">¡Compara, Compra y Vende!</h1>
                <h5 class="fw-bolder">Empieza con nosotros y descubre el mundo de la competencia en ventas</h5>
                <a href="{{ route('home.register') }}" id="download-button" class="btn btn-primary mt-5 mb-5">Registrate</a>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
          <div class="col col-12 col-sm-12 col-lg-4">
            <h2><i class="material-icons">insights</i></h2>
            <h5 class="fw-bold">Historial de precios</h5>
            <p class="fw-bolder">¡Encuentra los Mejores Precios en un Solo Lugar!</p>
            <p class="light">
                Compara precios de tus productos favoritos en diversas sucursales con nuestra potente
                herramienta de comparación. ¡Ahorra tiempo y dinero con un solo clic! Ya no tendrás que recorrer
                diferentes tiendas; nuestro sistema te muestra las mejores ofertas al instante</p>
          </div>
          <div class="col col-12 col-sm-12 col-lg-4">
            <h2><i class="material-icons">groups</i></h2>
            <h5 class="fw-bold">Opiniones</h5>
            <p class="fw-bolder">¡Explora el Poder de las Opiniones Compartidas!</p>
            <p class="light">
                Descubre lo que otros piensan sobre productos, tiendas y mucho más con nuestro exclusivo sistema
                de comparación de opiniones. ¿Buscas recomendaciones genuinas y valiosas? Navega a través de las
                experiencias compartidas por usuarios reales. Obtén insights auténticos y toma decisiones más
                acertadas. </p>
          </div>
          <div class="col col-12 col-sm-12 col-lg-4">
            <h2><i class="material-icons">settings</i></h2>
            <h5 class="fw-bold">Inventario</h5>
            <p class="fw-bolder">
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
    

@endsection
<!-- Final del contenido -->
