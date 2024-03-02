<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.6.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f92379971f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo" >
                    <img src="{{ asset('images/logos-b.png') }}" alt="Logo" width="25px" height="25px" style="margin-top:-5px">
                    <a href="#" class="text-white">PaySave</a>
                </div>
                <div class="sidebar-porfile">
                    <img src="{{ asset('images/ceo.jpg') }}" class="sidebar-porfile-photo mb-2" alt="Profile">
                    <div class="porfile-name">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</div>
                    <small>Ceo PaySave</small>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Principal
                    </li>
                    <li class="sidebar-item{{ request()->routeIs('dashboard')? "-active" : ""}} ">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-home pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item{{ request()->routeIs('personal')? "-active" : ""}} ">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-users pe-2"></i>
                            Personal
                        </a>
                    </li>
                    <li class="sidebar-item{{ request()->routeIs('personal')? "-active" : ""}} ">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#Productos"
                            aria-expanded="false" aria-controls="Productos">
                            <i class="fa-solid fa-boxes-packing pe-2"></i>
                            Productos
                        </a>
                        <ul id="Productos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('products.index')}}" class="sidebar-link">Productos</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('brands.index')}}" class="sidebar-link">Marcas</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('category.index')}}" class="sidebar-link">Categorias</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('subcategory.index')}}" class="sidebar-link">Subcategorias</a>
                            </li>
                        </ul>
                    </li>

                        {{-- <li><a href="" class="{{ request()->is('products/category*') ? 'selectdSubMenu' : '' }}"><i class="material-icons">category</i>Categorias</a></li>
                        <li><a href="" class="{{ request()->is('products/subcategory*') ? 'selectdSubMenu' : '' }}"><i class="material-icons">category</i>Subcategorias</a></li>
                        <li><a href="" class="{{request()->is('products/home*') ? 'selectdSubMenu' : '' }}"><i class="material-icons">inventory_2</i>Productos</a></li> --}}
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Profile
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Dashboard
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Dashboard Analytics</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Dashboard Ecommerce</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                            aria-expanded="false" aria-controls="auth">
                            <i class="fa-regular fa-user pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Register</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-header">
                        Configuración
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                            aria-expanded="false" aria-controls="multi">
                            <i class="fa-solid fa-share-nodes pe-2"></i>
                            Multi Level
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                    Two Links
                                </a>
                                <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Link 1</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Link 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">

            <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a href="#" class="n-toggler me-auto btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>

            
            <main class="content">
                <div class="container-fluid">
                    <main class="principal">

                        <div class="header mb-5">
                            <div class="header-name">
                                @yield('title-header')
                            </div>
                            <div class="header-message">
                                @yield('message-header')
                            </div>
                        </div>
                        
                        @yield('content')
                        
                    </main>
                </div>
            </main>

        </div>
    </div>

   
    
    
</body>
<script>
    const toggler = document.querySelector(".btn");
        toggler.addEventListener("click",function(){
            document.querySelector("#sidebar").classList.toggle("collapsed");
    });
</script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<!-- Script de java -->
@yield('script')

</html>
