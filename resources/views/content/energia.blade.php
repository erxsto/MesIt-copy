@extends('layouts.index')
@section('content')
<script type="text/javascript">


setInterval(function() {

var JSON=$.ajax({

url:"/api/dataenergia",
dataType:'json',
method: 'GET',
async: false}).responseText;
var Respuesta= jQuery.parseJSON(JSON);


document.getElementById("indicador").innerHTML =  (Respuesta[0].fase1A)/10;
document.getElementById("indicador1").innerHTML = (Respuesta[0].fase2A)/10;
document.getElementById("indicador2").innerHTML = (Respuesta[0].fase3A)/10;
document.getElementById("indicador3").innerHTML = (Respuesta[0].voltsL1)/10;
document.getElementById("indicador4").innerHTML = (Respuesta[0].voltsL2)/10;
document.getElementById("indicador5").innerHTML = (Respuesta[0].voltsL3)/10;
document.getElementById("indicador6").innerHTML = (Respuesta[0].hz)/10;
document.getElementById("indicador7").innerHTML = (Respuesta[0].facpotencia)/1000;
document.getElementById("indicador8").innerHTML = (Respuesta[0].pottactiva)/10;
document.getElementById("indicador9").innerHTML = (Respuesta[0].pottreactiva)/10;
document.getElementById("indicador10").innerHTML = (Respuesta[0].energiaa)/10;
document.getElementById("indicador11").innerHTML = (Respuesta[0].energiar)/10;


}, 1700);

</script>
<div class="energy">
 <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador"></div>

        <hr> FASE 1A
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador1"></div>

        <hr> FASE 2A
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador2"></div>

        <hr> FASE 3A
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador3"> </div>
        
        <hr> VOLTS L1
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador4"></div>

        <hr> VOLTS L2
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador5"></div>

        <hr> VOLTS L3
    </div>
    
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador6"></div>

        <hr> Frecuencia (Hz)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador7"></div>

        <hr> Factor de Potencia
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador8"></div>

        <hr> Potencia total activa
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador9"></div>

      <hr>  Potencia total reactiva
    </div> 
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador10"></div>

        <hr> Energia activa
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num"id="indicador11"></div>

        <hr> Energia reactiva
    </div>
</div>
@endsection