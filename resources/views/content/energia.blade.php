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


document.getElementById("indicador").innerHTML =  (Respuesta[0].fase1A);
document.getElementById("indicador1").innerHTML = Respuesta[0].fase2A;
document.getElementById("indicador2").innerHTML = Respuesta[0].fase3A;
document.getElementById("indicador3").innerHTML = Respuesta[0].voltsL1;
document.getElementById("indicador4").innerHTML = Respuesta[0].voltsL2;
document.getElementById("indicador5").innerHTML = Respuesta[0].voltsL3;
document.getElementById("indicador6").innerHTML = (Respuesta[0].hz);


}, 1700);

</script>

 <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <txt id="indicador"></txt>

        FASE 1A
    </div class="a">
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div id="indicador1"></div>

        FASE 2A
    </div class="a">
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div id="indicador2"></div>

        FASE 3A
    </div class="a">
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div id="indicador3"> </div>
        <br>
        VOLTS L1
    </div class="a">
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div id="indicador4"></div>

        VOLTS L2
    </div class="a">
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div id="indicador5"></div>

        VOLTS L3
    </div class="a">
    
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div id="indicador6"></div>

        HZ
    </div class="a"> 
    
@endsection