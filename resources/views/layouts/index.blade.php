<!doctype html>
<html>
<head>
   @include('layouts.head')
</head>
<body>
<div class="container">
   <header class="row">
       @include('layouts.header')
   </header>
   <main class="py-4">
        @yield('content')
    </main>
   <footer class="row">
       @include('layouts.footer')
   </footer>
</div>
</body>
</html>