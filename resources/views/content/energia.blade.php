@extends('layouts.index')
@section('content')
@include('content.tempguardaralerta')
@include('content.cortos')
@include('content.vibracionguardaralerta')
<!-- SCRIPT OBTENCION DE DATOS ENERGÍA -->
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
        document.getElementById("indicador1").innerHTML = (Respuesta[0].fase2A) / 10;
        document.getElementById("indicador2").innerHTML = (Respuesta[0].fase3A) / 10;
        document.getElementById("indicador3").innerHTML = (Respuesta[0].voltsL1) / 10;
        document.getElementById("indicador4").innerHTML = (Respuesta[0].voltsL2) / 10;
        document.getElementById("indicador5").innerHTML = (Respuesta[0].voltsL3) / 10;
        document.getElementById("indicador6").innerHTML = (Respuesta[0].hz) / 10;
        document.getElementById("indicador7").innerHTML = (Respuesta[0].facpotencia) / 1000;
        document.getElementById("indicador8").innerHTML = (Respuesta[0].pottactiva) / 10;
        document.getElementById("indicador9").innerHTML = (Respuesta[0].pottreactiva) / 10;
        document.getElementById("indicador10").innerHTML = (Respuesta[0].energiaa) / 10;
        document.getElementById("indicador11").innerHTML = (Respuesta[0].energiar) / 10;
        document.getElementById("indicador12").innerHTML = (Respuesta[0].consumo_total) / 10;


    }, 1000);
</script>
<!-- DIVS PARA MUESTREO DE DATOS A TRAVÉS DEL SCRIPT -->
<div class="energy">
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador"></div>

        <hr> FASE 1A (A)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador1"></div>

        <hr> FASE 2A (A)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador2"></div>

        <hr> FASE 3A (A)
    </div>
</div>


<div class="energy">

    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador3"> </div>

        <hr> VOLTS L1 (V)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador4"></div>

        <hr> VOLTS L2 (V)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador5"></div>

        <hr> VOLTS L3 (V)
    </div>
</div>



<div class="energy">

    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador9"></div>

        <hr> Potencia total reactiva (KVAR)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador7"></div>

        <hr> Factor de Potencia (%)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador8"></div>

        <hr> Potencia total activa (KW)
    </div>
</div>


<div class="energy">

    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador6"></div>

        <hr> Frecuencia (Hz)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador10"></div>

        <hr> Energia activa (KWH)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador11"></div>

        <hr> Energia reactiva (KVARH)
    </div>
    <div class="a" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="num" id="indicador12"></div>

        <hr> Consumo Total (KW)
    </div>
</div><br><br>
<!-- BOTONES GRÁFICAS -->
<div class="botongrafica">
    <div class="linkboton"> <a href="./gfases"> Grafica Fases.</a></div>
</div><br>
<div class="botongrafica">
    <div class="linkboton"> <a href="./gvolts"> Grafica Volts.</a></div>
</div><br>
<div class="botongrafica">
    <div class="linkboton"> <a href="./gpotencias"> Grafica Potencias. </a></div>
</div><br>
<div class="botongrafica">
    <div class="linkboton"> <a href="./gfye">Grafica Frecuencia y Energia (act/react). </a></div>
</div><br><br>
<!-- DESCARGA DE REPORTE ENERGÍA -->
<div class="alert alert-dark alert-sm" role="alert">
    <h4 class="alert-heading">Descarga el reporte.</h4><br>
    <form class="form-inline" method="get" action="{{route('descargarPDFe')}}">
        <label>Fecha Desde:</label>
        <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
        <label>Hasta</label>
        <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
        <button class="btn btn-dark" name="search">
            <i class="fa fa-download"></i></button>
        <br>
    </form>
</div>
<br>
<hr>
</div>
@endsection