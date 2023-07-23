<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/"><img src="ruta_del_logo.png" alt="Ansatsu"></a>

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

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
              <a href="/" class="list-group-item list-group-item-action">Volver a Inicio</a>
              <div class="sidebar-heading">Inventario</div>
              <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Productos</a>
              <div class="sidebar-heading">Personal</div>
              <a href="{{ route('clients.index') }}" class="list-group-item list-group-item-action">Clientes</a>
              <a href="{{ route('workers.index') }}" class="list-group-item list-group-item-action">Trabajadores</a>
              <div class="sidebar-heading">Reabastecimiento</div>
              <a href="{{ route('suppliers.index') }}" class="list-group-item list-group-item-action">Proveedores</a>
              <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">Orden de Compra</a>
              <div class="sidebar-heading">Banco</div>
              <a href="{{ route('arqueos.index') }}" class="list-group-item list-group-item-action">Arqueo</a>
              <div class="sidebar-heading">Control de Usuarios</div>
              <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">Roles</a>
            </div>
          </div>
        <!-- /Sidebar -->

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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
