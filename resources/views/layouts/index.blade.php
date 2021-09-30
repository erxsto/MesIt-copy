<!doctype html>
<html>
<head>
   @include('layouts.head')
</head>

<body>
<div class="container">
   <header>
       @include('layouts.header')
   </header>
   <main class="py-4">
        @yield('content')
    </main>
   <footer>
       @include('layouts.footer')
   </footer>
</div>

</body>
</html>