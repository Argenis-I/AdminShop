<!DOCTYPE html>
<html>
<head>
    <title>Admin Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app3.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="ruta_del_logo.png" alt="Ansatsu"></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registrarse</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('products.show', ['product' => 3]) }}">Comprar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Opción 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Opción 3</a>
          </li>
        </ul>
      </nav>

        <!-- Contenido de la página -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="p-4">
                    <!-- Aquí va el contenido de tu página -->
                    <main>
                        <!-- Contenido específico de cada vista -->
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        <!-- /Contenido de la página -->
    </div>

    <!-- Aquí puedes incluir tus scripts JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
