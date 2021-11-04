<!-- Menú -->

<!-- SCRIPT ALERTAS CAMPANA -->
<script>
setInterval(function() {
      var JSON = $.ajax({
        url: "/api/alertashow",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var alertas1 = jQuery.parseJSON(JSON);
      var  desc = alertas1[0].descripcion;
      var  desc1 = alertas1[1].descripcion;
      var  desc2 = alertas1[2].descripcion;
      var  desc3 = alertas1[3].descripcion;

      $('#not').html("<li id='n4' class='linot alert alert-warning alert-dismissible fade show'> "+desc+" &nbsp; <a id='desca'>ok</a></li>")
      $('#not').append("<li id='n3'class='linot alert alert-warning alert-dismissible fade show'> "+desc1+" &nbsp; <a id='desca1'>ok</a></li>")
      $('#not').append("<li id='n2'class='linot alert alert-warning alert-dismissible fade show'> "+desc2+" &nbsp; <a id='desca2'>ok</a></li>")
      $('#not').append("<li id='n1'class='linot alert alert-warning alert-dismissible fade show'> "+desc3+" &nbsp; <a id='desca3'>ok</a></li>")
    
     if(desc=='Alerta critica Temperatura'){
      $('#desca').html("<a id='desca' href='./temperatura'> <i class='fa fa-arrow-right'></i></a>")
    }else{
      $('#desca').html("<a id='desca' href='./vibracion'> <i class='fa fa-arrow-right'></i></a>")
    } 
    if(desc1=='Alerta critica Temperatura'){
      $('#desca1').html("<a id='desca' href='./temperatura'> <i class='fa fa-arrow-right'></i></a>")
    }else{
      $('#desca1').html("<a id='desca' href='./vibracion'> <i class='fa fa-arrow-right'></i></a>")
    } 
    if(desc2=='Alerta critica Temperatura'){
      $('#desca2').html("<a id='desca' href='./temperatura'> <i class='fa fa-arrow-right'></i></a>")
    }else{
      $('#desca2').html("<a id='desca' href='./vibracion'> <i class='fa fa-arrow-right'></i></a>")
    } 
    if(desc3=='Alerta critica Temperatura'){
      $('#desca3').html("<a id='desca' href='./temperatura'> <i class='fa fa-arrow-right'></i></a>")
    }else{
      $('#desca3').html("<a id='desca' href='./vibracion'> <i class='fa fa-arrow-right'></i></a>")
    } 
    }, 1000);

   
    </script>

<nav class="navbar navbar-expand-sm navbar-custom">
  
  <a class="navbar-brand izqlog">
    <img style="width:9.375em;" class="logo" src="http://amats.com.mx/images/logo-amats-electric-r.svg" alt="amats_logo">
  </a>
  <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="toggleMobileMenu">
    <text class="navbar-item active btn-lg mesit"></text>
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
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./temperatura"><i class="bi bi-speedometer"></i><span class="tooltip-box">Temperatura</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./modulo_control"><i class="bi bi-sliders"></i><span class="tooltip-box">M.Control</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:300px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./alertas"><i class="fa fa-server"></i><span class="tooltip-box">Historial</span></a>
      </li>
 
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="{{route('cindex')}}"><i class="fa fa-envelope"></i><span class="tooltip-box">Correo</span></a>
      </li>
      <li class="nav-item active topitem" style="margin-left:10px;">
        <a class="hoverit nav-link btn-lg navbar-custom tooltip" href="./destroy"><i class="fa fa-sign-out"></i></a>
      </li>
      <!-- NOTIFICACIONES -->
    <li class="dropdown" style="margin-left:10px;">
        <a id="notificaciones" style="box-shadow: 0px 1px 5px 1px rgba(0,0,0,0.31);
                                      -webkit-box-shadow: 0px 1px 5px 1px rgba(0,0,0,0.31);
                                      -moz-box-shadow: 0px 1px 5px 1px rgba(0,0,0,0.31);" 
        class="btn btn-black dropdown-toggle hoverit nav-link btn-lg navbar-custom tooltip" 
        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i>
        </a>
        
       <ul class="dropdown-menu" id="notificaciones">
      
          <li id="not">

          </li>
       </ul>
    </li>


      <li class="mx-5">
        <p class="hoverit  btn-lg navbar-custom tooltip">Bienvenido <b>{{ session('session_name') }}</b></p>
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
