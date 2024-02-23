<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f92379971f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">



    <!-- Jquery -->

    {{-- Style --}}
    <style>
        /* Var with the color */
        :root {
            /* --main-color: #2196F3; */
            --main-color: #153d77;
            --active-color: #64b5f6;
        }

        /* Change Color */
        input:focus {
            border-bottom: 1px solid var(--main-color) !important;
            box-shadow: 0 1px 0 0 var(--main-color) !important;
        }

        /* Chane after focus */
        input:focus+label {
            color: var(--main-color) !important;
        }

        .btn.acept {
            background-color: var(--main-color) !important;
        }

        .btn.cancel {
            background-color: #F44336 !important;
        }

        .logout {
            cursor: pointer;
            background-color: #F44336 !important;
            color: #ffffff !important;
        }

        .navbar-toggler, .n-toggler {
          order: -1;
        }

        #sidebar-nav {
            width: 160px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-repeat: no-repeat;
            background-position: center bottom;
            background-size: cover;
        }

        h3 {
            font-size: 1.2375rem;
            color: #FFF;
        }

        a {
            cursor: pointer;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        li {
            list-style: none;
        }

        /* Layout skeleton */

        .wrapper {
            align-items: stretch;
            display: flex;
            width: 100%;
        }

        #sidebar {
            max-width: 250px;
            min-width: 250px;
            transition: all 0.35s ease-in-out;
            z-index: 1111;
        }

        /* Sidebar collapse */

        #sidebar.collapsed {
            margin-left: -250px;
        }

        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
        }

        .sidebar-logo {
            padding: 1.0rem 1.5rem;
            background-color: var(--main-color) !important;
        }

        .sidebar-logo a {
            color: #e9ecef;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 0;
        }

        .sidebar-header {
            color: #adb5bd;
            font-size: .75rem;
            padding: 1.5rem 1.5rem .375rem;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: var(--main-color);
            position: relative;
            display: block;
            font-size: 1rem;
        }



        .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        .content {
            flex: 1;
            max-width: 100vw;
            width: 100vw;
        }

        .sidebar-porfile{
            background: #fff;
            color: #000;
            padding: 1.5rem 1rem 1rem;
            text-align: center;
        }

        .sidebar-porfile-photo{
            border-radius: 50%;
            width: 60px;
            height: 60px;
        }

        .porfile-name {
            font-weight: 500!important;
        }

        /* Responsive */

        @media (min-width:768px) {
            .content {
                width: auto;
            }
        }

    </style>

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
                    <div class="porfile-name">Gerardo Matadama</div>
                    <small>Ceo PaySave</small>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Tools & Components
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-home pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Profile
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i>
                            Pages
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Analytics</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Ecommerce</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Crypto</a>
                            </li>
                        </ul>
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
                        Multi Level Nav
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
            <nav class="navbar navbañr-expand-lg navbar-light bg-primary">
                <div class="container-fluid">
        
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    
                    <a href="#" class="n-toggler me-auto btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </a>
        
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <main>
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
<!-- Script de java -->
@yield('script')

</html>
