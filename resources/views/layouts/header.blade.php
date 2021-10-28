<!-- Menú -->
<nav class="navbar navbar-expand-sm navbar-custom">
  <a class="navbar-brand izqlog">
    <img style="width:9.375em;" class="logo" src="http://amats.com.mx/images/logo-amats-electric-r.svg" alt="amats_logo">
  </a>
  <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="toggleMobileMenu">
    <text class="navbar-item active btn-lg mesit">MES INTERFACE IT</text>
    <ul class="navbar-nav text-center">
    @if(session()->has('session_id'))
      <li class="nav-item active izqitem topitem">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./"><i class="bi bi-house"></i><span class="tooltip-box">Dashboard</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./vibracion"><i class="bi bi-bezier2"></i><span class="tooltip-box">Vibración</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./energia"><i class="fa fa-car-battery"></i><span class="tooltip-box">Energía</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./temperatura"><i class="bi bi-speedometer2"></i><span class="tooltip-box">Temperatura</span></a>
      </li>
      <li>
      <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./alertas"><i class="fa fa-server"></i><span class="tooltip-box">Historial</span></a>
      </li>
      <li>
      <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="{{route('correo.index')}}"><i class="fa fa-envelope"></i><span class="tooltip-box">Correo</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./destroy"><i class="fa fa-sign-out"></i></a>
      </li>
      <li class="mx-5">
        <p class="text-xl">Bienvenido <b>{{ session('session_name') }}</b></p>
      </li>
      @else
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./login"><i class="fa fa-user-circle"></i><span class="tooltip-box">Logueate</span></a>
      </li>
      @endif
      <!-- <input type="checkbox" class="checkbox" id="checkbox">
      <label for="checkbox" class="label">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
      </label> -->
    </ul>
  </div>
</nav>