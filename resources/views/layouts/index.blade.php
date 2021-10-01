<!doctype html>
<html>
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-center text-white pt-5 pb-1">
        @include('layouts.footer')
    </footer>
</body>
</html>