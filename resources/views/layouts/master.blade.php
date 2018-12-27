<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VISION | </title>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet"  href="{{ asset('css/app.css') }}" >


    {{-- <link rel="stylesheet"  href="{{ asset('css/custom.css') }}" > --}}
     <!-- Favicon-->
     <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-4/img/favicon.ico">
    
</head>
<body>
  <div id="app">
    <header class="header">   
        <nav class="navbar navbar-expand-lg">
          <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
              <div class="close-btn">Close <i class="fa fa-close"></i></div>
              <form id="searchForm" action="#">
                <div class="form-group">
                  <input type="search" name="search" placeholder="What are you searching for...">
                  <button type="submit" class="submit">Search</button>
                </div>
              </form>
            </div>
          </div>
          <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
              <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">VIS</strong><strong>ION</strong></div>
                <div class="brand-text brand-sm"><strong class="text-primary">V</strong><strong>S</strong><strong>N</strong></div></a>
              <!-- Sidebar Toggle Btn-->
              <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>
              <!-- Log out               -->
              <div class="list-inline-item logout"><a id="logout" href="login.html" class="nav-link">Logout <i class="icon-logout"></i></a></div>
            </div>
          </div>
        </nav>
      </header>
      <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center"><a href="pages-profile.html">
              <div class="avatar"><img src="http://127.0.0.1:8000/img/Vision.jpg" alt="..." class="img-fluid rounded-circle"></div></a>
            <div class="title">
              <h1 class="h5">Juan Ignacio Sarno</h1>
              <p>Productor</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
                  <li class=""><router-link to="/"> <i class="fa fa-home"></i>Home</router-link></li>
                  <li class=""><router-link to="/polizas/automotor"> <i class="fa fa-car"></i>Automotor</router-link></li>
                  <li><a href="#chartsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-list"></i>Otros Riesgos</a>
                    <ul id="chartsDropdown" class="collapse list-unstyled ">
                      <li><a href=''>Accidente Personal</a></li>
                      <li><a href=''>Combinado Familiar</a></li>
                      <li><a href=''>Otros Riesgos</a></li>
                    </ul>
                  </li>
                  <li class=""><a> <i class="fas fa-car-crash"></i>Siniestros</a></li>
                  <li class=""><a> <i class="fas fa-folder-open"></i>Endosos</a></li>
                  <li class=""><router-link to="/clientes"> <i class="fa fa-users"></i>Clientes</router-link></li>
                  <li><a href="#componentsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-th"></i>Administracion</a>
                    <ul id="componentsDropdown" class="collapse list-unstyled borde-violeta">
                      <li><router-link to="/administracion/companias">Compañias</router-link></li>
                      <li><router-link to="/administracion/organizadores">Organizadores</router-link></li>
                      <li><router-link to="/administracion/productores">Productores</router-link></li>
                      <li><a href="">Libros Rubricados</a></li>
                      <li><a href="">Estadisticas</a></li>
                      <li><a href="">Marca / Modelos</a></li>
                    </ul>
                  </li>
                  <li><a href="#pagesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-wrench"></i>Configuracion</a>
                    <ul id="pagesDropdown" class="collapse list-unstyled ">
                      <li><a href="pages-contacts.html">Usuarios</a></li>
                    </ul>
                  </li>
          </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
          
                <router-view></router-view>
              {{-- <h2 class="h5 no-margin-bottom">Dashboard</h2> --}}
            
          <div>            
          </div>
          {{-- <footer class="footer">
            <div class="footer__block block no-margin-bottom">
              <div class="container-fluid text-center">
                <p class="no-margin-bottom">2018 &copy; Vision. </p>
              </div>
            </div>
          </footer> --}}
        </div>
      </div>
  </div>
<script src="{{mix('js/app.js')}}"></script>
{{-- <script src="{{mix('../../js/gsdk-bootstrap-wizard.js')}}"></script> --}}
{{-- <script src="{{mix('../../js/jquery.bootstrap.wizard.js')}}"></script> --}}
</body>

</html>
