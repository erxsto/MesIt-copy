@extends('layouts.index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
  setInterval(function() {

    var JSON = $.ajax({

      url: "/api/dataenergia",
      dataType: 'json',
      method: 'GET',
      async: false
    }).responseText;
    var Respuesta = jQuery.parseJSON(JSON);


    document.getElementById("indicador").innerHTML = (Respuesta[0].fase1A) / 10;
    document.getElementById("indicador3").innerHTML = (Respuesta[0].voltsL1) / 10;
    document.getElementById("indicador6").innerHTML = (Respuesta[0].hz) / 10;
  }, 1000);
</script>
<style>
  .frame {
    position: relative;
    top: 50%;
    left: 50%;
    width: 400px;
    height: 400px;
    margin-top: -50px;
    margin-left: -200px;
    border-radius: 2px;
    box-shadow: 0.5rem 1rem 1rem 0 rgba(0, 0, 0, 0.6);
    overflow: hidden;
    color: #333;
    font-family: "Rubik", Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background: #201c29;
  }

  .thermostat {
    position: absolute;
    width: 200px;
    height: 200px;
    top: 100px;
    left: 100px;
    background: #F2F2F2;
    border-radius: 50%;
    box-shadow: 0px 0px 1rem rgba(0, 0, 0, 0.8);
  }

  .thermostat .control {
    position: absolute;
    z-index: 5;
    width: 130px;
    height: 130px;
    top: 25%;
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
    color: #873183;
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
    color: #8e2275;
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
    width: 180px;
    height: 180px;
    top: 10px;
    left: 10px;
    background: url("http://100dayscss.com/codepen/thermostat-gradient.jpg") center center no-repeat;
    border-radius: 50%;
    box-shadow: inset 2px 4px 4px 0px rgba(0, 0, 0, 0.3);
  }

  .thermostat .ring .bottom_overlay {
    position: absolute;
    width: 95px;
    height: 95px;
    top: 50%;
    left: 50%;
    background: #F2F2F2;
    transform-origin: 0 0;
    transform: rotate(45deg);
    border-radius: 0 0 95px 0;
  }

  #slider {
    position: absolute;
    width: 170px;
    height: 150px;
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
    background-color: rgba(82, 44, 109, 0.8);
  }

  .rs-tooltip.edit,
  .rs-tooltip .rs-input,
  .rs-tooltip-text {
    font-family: rubik, helvetica, sans-serif;
    font-size: 3.3rem;
    background: transparent;
    color: #8e2275;
    font-weight: 400;
    top: 65%;
    height: 3.9rem;
    padding: 0 !important;
    width: 4.5rem;
  }

  #slider:hover .rs-tooltip,
  .rs-tooltip:focus,
  .rs-tooltip-text:focus {
    border: none;
    transform: scale(1.1);
    transition: 0.1s;
  }

  #slider .rs-transition {
    transition-timing-function: cubic-bezier(1, -0.53, 0.405, 1.425);
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
<center>
  <h2>Control de energía</h2><br><br>
</center>
<div class="text-center">
  <button class="boton uno" type="submit" style="float: left;"><span>Izquierda</span>
  </button>

  <button class="boton seis" type="submit">
    <span>Stop</span>
    <svg>
      <rect x="0" y="0" fill="none"></rect>
    </svg>
  </button>
  <button class="boton seis" type="submit">
    <span>Reset</span>
    <svg>
      <rect x="0" y="0" fill="none"></rect>
    </svg>
  </button>
  <button class="boton uno" type="submit" style="float: right;"><span>Derecha</span>
  </button>
</div>
<br><br><br><br><br>
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
      url: "/api/dataenergia",
      dataType: 'json',
      method: 'GET',
      async: false
    }).responseText;
    var Respuesta = jQuery.parseJSON(JSON);
    var hz = Respuesta[0].hz / 10;
    $("#slider").roundSlider({
      radius: 72,
      circleShape: "half-top",
      sliderType: "min-range",
      mouseScrollAction: true,
      value: hz,
      id: "valsliders",
      handleSize: "+5",
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
@endsection