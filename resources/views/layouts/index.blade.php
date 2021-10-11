<!doctype html>
<html>
<!-- Mandamos a llamar al head para que se muestre en todas las vistas-->

<head>
    @include('layouts.head')
</head>

<body>
    <!-- Mandamos a llamar al header -->
    <header>
        @include('layouts.header')
    </header>
    <!-- Mandamos a llamar al content -->
    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Mandamos a llamar al footer  -->
    <footer class="bg-dark text-center text-white pt-5 pb-1">
        @include('layouts.footer')
    </footer>
</body>

</html>