<!-- Plantilla -->
@extends('layouts.public')

<!-- Titulo -->
@section('title', 'Home')

<!-- Contenido -->
@section('content')

    {{-- <div class="container text-center mt-5">
        <div class="row">
            <div class="col col-12 col-sm-12 col-lg-12">
                <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 200px;">
                <h1 class="fw-bold ptxt">¡Compara, Compra y Vende!</h1>
                <h5 class="fw-bolder">Empieza con nosotros y descubre el mundo de la competencia en ventas</h5>
                <a href="{{ route('home.register') }}" id="download-button" class="btn btn-primary mt-5 mb-5">Registrate</a>
        </div>
    </div>
     --}}

    {{-- <div class="container text-center">
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
    </div> --}}


    <div class="container text-center mt-5">
        <div class="row">
            <div class="col col-12 col-sm-12 col-lg-12">
                <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 200px;">
                <h1 class="fw-bold ptxt">Compare, Buy, and Sell!</h1>
                <h5 class="fw-bolder">Start with us and discover the world of competitive sales</h5>
                {{-- Register button --}}
                <a href="{{ route('home.register') }}" id="download-button" class="btn btn-primary mt-5 mb-5">Register</a>
            </div>
        </div>
    
        <div class="container text-center">
            <div class="row">
                <div class="col col-12 col-sm-12 col-lg-4">
                    <h2><i class="material-icons">insights</i></h2>
                    <h5 class="fw-bold">Price History</h5>
                    <p class="fw-bolder">Find the Best Prices in One Place!</p>
                    <p class="light">
                        Compare prices of your favorite products at various stores with our powerful
                        comparison tool. Save time and money with just one click! You won't have to visit
                        different stores anymore; our system shows you the best deals instantly.</p>
                </div>
                <div class="col col-12 col-sm-12 col-lg-4">
                    <h2><i class="material-icons">groups</i></h2>
                    <h5 class="fw-bold">Reviews</h5>
                    <p class="fw-bolder">Explore the Power of Shared Reviews!</p>
                    <p class="light">
                        Discover what others think about products, stores, and much more with our exclusive
                        review comparison system. Looking for genuine and valuable recommendations?
                        Browse through experiences shared by real users. Get authentic insights and make
                        smarter decisions.</p>
                </div>
                <div class="col col-12 col-sm-12 col-lg-4">
                    <h2><i class="material-icons">settings</i></h2>
                    <h5 class="fw-bold">Inventory</h5>
                    <p class="fw-bolder">
                        Control Your Inventory and Sales with Our Management Tool!
                    </p>
                    <p class="light">
                        Give your business the edge it needs with our management tool. Keep meticulous
                        track of your inventory and detailed records of your sales. Our platform is
                        designed for businesses seeking efficiency and growth.</p>
                </div>
            </div>
        </div>
    </div>
    

@endsection
<!-- Final del contenido -->
