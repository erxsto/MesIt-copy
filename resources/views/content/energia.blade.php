@extends('layouts.index')
@section('content')
<script type="text/javascript">


setInterval(function() {

var JSON=$.ajax({

url:"/api/dataenergia",
dataType:'json',
method: 'GET',
async: false}).responseText;
var Respuesta=jQuery.parseJSON(JSON);



document.getElementById("indicador").innerHTML =  Math.round(Respuesta[0].fase1A);
document.getElementById("indicador1").innerHTML = Respuesta[0].fase2A;
document.getElementById("indicador2").innerHTML = Respuesta[0].fase3A;
document.getElementById("indicador3").innerHTML = Respuesta[0].voltsL1;
document.getElementById("indicador4").innerHTML = Respuesta[0].voltsL2;
document.getElementById("indicador5").innerHTML = Respuesta[0].voltsL3;
document.getElementById("indicador6").innerHTML = Math.round(Respuesta[0].hz);


}, 1700);

</script>

 <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador"></h4>

        FASE 1A
    </a>
    <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador1"></h4>

        FASE 2A
    </a>
    <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador2"></h4>

        FASE 3A
    </a>
    <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador3"></h4>

        VOLTS L1
    </a>
    <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador4"></h4>

        VOLTS L2
    </a>
    <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador5"></h4>

        VOLTS L3
    </a>
    
    <a style="margin-left:11.4cm;"href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4 id="indicador6"></h4>

        HZ
    </a> 
    
@endsection