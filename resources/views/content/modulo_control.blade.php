@extends('layouts.index')
@section('content')
@include('content.sweetalerttemp-copy')
@include('content.sweetalertvib-copy')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- SCRIPT OBTENCIÓN DE DATOS  -->
<script type="text/javascript">
  setInterval(function() {

    var JSON = $.ajax({

      url: "/api/dataenergiam",
      dataType: 'json',
      method: 'GET',
      async: false
    }).responseText;
    var Respuesta = jQuery.parseJSON(JSON);


    document.getElementById("indicador").innerHTML = (Respuesta[0].amperaje) / 10;
    document.getElementById("indicador3").innerHTML = (Respuesta[0].voltaje) / 10;
    document.getElementById("indicador6").innerHTML = (Respuesta[0].frecuencia) / 10;
  }, 1000);
</script>
<!-- ESTILOS  PARA KNOB (MANDO CIRCULAR) -->
<style>
  .a {
    height: 130px;
    width: 200px;
  }

  .frame {
    position: relative;
    top: 50%;
    left: 50%;
    width: 500px;
    height: 500px;
    margin-top: -50px;
    margin-left: -200px;
    border-radius: 2px;
    /* box-shadow: 0.5rem 1rem 1rem 0 rgba(0, 0, 0, 0.6); */
    overflow: hidden;
    color: #333;
    font-family: "Rubik", Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background: #FFF;
    /*rgb(2,0,36);
    background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(4,9,60,1) 60%, rgba(139,139,164,1) 94%); */
  }

  .thermostat {
    position: absolute;
    width: 320px;
    height: 320px;
    top: 100px;
    left: 80px;
    background: #F2F2F2;
    border-radius: 50%;
    box-shadow: 0px 0px 1rem rgba(0, 0, 0, 0.8);

  }

  .thermostat .control {
    position: absolute;
    z-index: 5;
    width: 250px;
    height: 250px;
    top: 15%;
    left: 35px;
    background: #E6E6E6;
    border-radius: 50%;
    box-shadow: 0 0 1rem rgba(0, 0, 0, 0.7);
  }

  .thermostat .control .temp_outside {
    position: absolute;
    top: 25px;
    left: 6px;
    right: 0;
    text-align: center;
    font-weight: 300;
    font-size: 1rem;
  }

  .thermostat .control .temp_room {
    position: absolute;
    top: 34px;
    left: 0;
    right: 0;
    text-align: center;
    font-weight: 400;
    font-size: 60px;
    line-height: 60px;
    color: #020201;
    letter-spacing: -8px;
    padding-right: 12px;
    opacity: 1;
    transform: translateX(0);
    transition: all 0.5s ease-in-out;
  }

  .thermostat .control .temp_room span {
    position: absolute;
    top: 0;
    right: 37px;
    font-size: 2rem;
    line-height: 34px;
    padding: 3px 0 0 7px;
    color: #020201;
  }

  .room {
    position: absolute;
    bottom: 18px;
    left: 0;
    right: 0;
    text-align: center;
    font-weight: 300;
    font-size: 1rem;
  }

  .thermostat .ring {
    position: absolute;
    width: 300px;
    height: 300px;
    top: 10px;
    left: 10px;
    background: rgb(2, 0, 36);
    background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(12, 222, 57, 1) 0%, rgba(205, 18, 34, 1) 100%);
    border-radius: 50%;
    box-shadow: inset 2px 4px 4px 0px rgba(0, 0, 0, 0.3);
  }

  .thermostat .ring .bottom_overlay {
    position: absolute;
    width: 195px;
    height: 195px;
    top: 30%;
    left: 50%;
    background: #F2F2F2;
    transform-origin: 0 0;
    transform: rotate(45deg);
    border-radius: 0 0 95px 0;
  }

  #slider {
    position: absolute;
    width: 270px;
    height: 250px;
    top: 36%;
    left: 32%;
    z-index: 1000;
  }

  #slider .rs-border {
    border-color: transparent;
  }

  .rs-control .rs-range-color,
  .rs-control .rs-path-color,
  .rs-control .rs-bg-color {
    background-color: rgba(0, 0, 0, 0);
  }

  .rs-control .rs-handle {
    background-color: rgba(0, 0, 0);
  }

  .rs-tooltip.edit,
  .rs-tooltip .rs-input,
  .rs-tooltip-text {
    font-family: rubik, helvetica, sans-serif;
    font-size: 5rem;
    background: transparent;
    color: #020201;
    font-weight: 400;
    margin-left: -20px;
    top: 80%;
    height: 3.9rem;
    padding: 0 !important;
    width: 5.5rem;
  }

  #slider:hover .rs-tooltip,
  .rs-tooltip:focus,
  .rs-tooltip-text:focus {
    border: none;
    transform: scale(1.1);
    transition: 0.1s;
  }

  #slider .rs-transition {
    transition-timing-function: cubic-bezier(.29, 1.01, 1, -0.68);
  }

  .instructions {
    position: absolute;
    bottom: 0.5rem;
    color: rgba(255, 255, 255, 0.25);
    font-size: 1rem;
    font-family: raleway, sans-serif;
    width: 85%;
    left: 10%;
    font-weight: 300;
    letter-spacing: 0.05rem;
    line-height: 1.3;
    text-align: center;
  }

  .fas {
    -webkit-animation: pulse 1s infinite;
    animation: pulse 1s infinite;
  }

  @-webkit-keyframes pulse {
    50% {
      transform: scale(0.9);
    }
  }

  @keyframes pulse {
    50% {
      transform: scale(0.9);
    }
  }
</style>
<!-- ESTRUCTURA QUE SE MOSTRARÁ EN LA VISTA -->

<center>
  <h2>Control de energía</h2><br><br>
</center>
<div class="text-center">
  <button class="boton uno izq" type="button" style="float: left;" id="izq"><span>Izquierda</span>
  </button>

  <button class="boton seis stop" type="submit" id="stop">
    <span>Stop</span>
    <svg>
      <rect x="0" y="0" fill="none"></rect>
    </svg>
  </button>
  <button class="boton seis reset" type="submit" id="reset">
    <span>Reset</span>
    <svg>
      <rect x="0" y="0" fill="none"></rect>
    </svg>
  </button>
  <button class="boton uno der" type="submit" style="float: right;" id="der"><span>Derecha</span>
  </button>
</div>
<br><br><br><br>
<div class="text-center">
  <div class="frame">
    <div id="slider" class="rslider"></div>
    <div class="thermostat">
      <div class="ring">
        <div class="bottom_overlay"></div>
      </div>
      <div class="control">
        <div class="room">Frecuencia</div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="text-center">
  <div class="a" href="#">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <div class="num" id="indicador"></div>

    <hr> Amperaje
  </div>
  <div class="a" href="#">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <div class="num" id="indicador3"> </div>

    <hr> Voltaje
  </div>
  <div class="a" href="#">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <div class="num" id="indicador6"></div>
    <hr> Frecuencia
  </div>
</div>
<input type="hidden" id="valslider">
<script>
  
  var JSON = $.ajax({
    url: "/api/dataenergiam",
    dataType: 'json',
    method: 'GET',
    async: false
  }).responseText;
  var Respuesta = jQuery.parseJSON(JSON);
  var izquierdo = Respuesta[0].izquierdo;
  var derecho = Respuesta[0].derecho;
  var stop = Respuesta[0].stop;
  var reset = Respuesta[0].reset;



  $('#izq').on('click', (e) => {
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updateder",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });
    
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updatestop",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

     

  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updatereset",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

    
    $.ajax({
      type: 'POST',
      dateType: 'json',
      url: "/api/updateizq",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        data: 1
      },
    });
  });
  $('#der').on('click', (e) => {
      $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updateizq",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });
    
  
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updatestop",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

    
  
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updatereset",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

    
    
  $.ajax({
      type: 'POST',
      dateType: 'json',
      url: "/api/updateder",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        data: 1
      },
    });
  });
  
  $('#stop').on('click', (e) => {
  
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updateder",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });
    
  
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updateizq",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

    
  
  $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updatereset",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

    
  $.ajax({
      type: 'POST',
      dateType: 'json',
      url: "/api/updatestop",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        data: 1
      },
    });
  });
  $('#reset').on('click', (e) => {

      $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updateder",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

      $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updatestop",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

  
      $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/updateizq",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: 0
        },
      });

    

  $.ajax({
      type: 'POST',
      dateType: 'json',
      url: "/api/updatereset",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        data: 1
      },
    });
  });
</script>
<!-- OBTENCIÓN DE HZ Y ENVÍO DE SU NUEVO VALOR -->
<script>
  var JSON = $.ajax({
    url: "/api/dataenergiam",
    dataType: 'json',
    method: 'GET',
    async: false
  }).responseText;
  var Respuesta = jQuery.parseJSON(JSON);
  var frecuencia = Respuesta[0].frecuencia / 10;
  $("#slider").roundSlider({
    radius: 100,
    circleShape: "half-top",
    sliderType: "min-range",
    mouseScrollAction: true,
    value: frecuencia,
    id: "valsliders",
    handleSize: "+18",
    min: 0,
    max: 60,
    change: function(args) {
      console.log(args.value);
      $('#valslider').html(args.value);

      $.ajax({
        type: 'POST',
        dateType: 'json',
        url: "/api/valueslider",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          data: args.value * 10
        },
      });
    }
  });
</script>
<!-- SCRIPT AJUSTE DE KNOB CENTRADO  -->
<script>
  setInterval(function() {
    $(document).ready(function() {
      var ax = $('.rs-move');
      ax.css({
        "margin-left": "-35px"
      });
      var dpnt = $('.rs-tooltip-text');
      dpnt.css({
        "margin-left": "-60px",
        "margin-top": "-38px"
      });

    });
  }, 1);
</script>
@endsection