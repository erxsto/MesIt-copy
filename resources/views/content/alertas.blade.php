@extends('layouts.index')
@section('content')
@include('content.tempguardaralerta')
@include('content.vibracionguardaralerta')
<style>
  .cta {
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(255, 255, 255, 0.9)), url("https://www.efeverde.com/storage/2015/12/cielo-nubes-EFEverde.jpg") fixed center center;
  }

  .cta h3 {
    color: #fff;
    font-size: 30px;
    font-weight: 70;
    text-align: center;
  }

  .cta p {
    color: #fff;
  }

  .cta .cta-btn {
    font-family: "Raleway", sans-serif;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 28px;
    border-radius: 25px;
    transition: 0.5s;
    margin-top: 10px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    color: #fff;
  }

  .cta .cta-btn:hover {
    border-color: #fff;
  }
</style>

<center><br>
  <h5>Consulta de Historial de Alertas</h5><br><br>
</center>

<br>
<br>

<form class="form-inline" method="get" action="{{route('alertas')}}">

  <select name="slcm" id="slcm" class="form-control">

    <option value="">Selecciona el módulo</option>
    <option value="temperatura">Temperatura</option>
    <option value="vibracion">Vibración</option>

  </select>


  <label>Fecha Desde:</label>
  <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
  <label>Hasta</label>
  <br>

  <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
  <button class="btn btn-dark" name="search" onclick="showtable();"><span class="glyphicon glyphicon-search">Consultar</span></button>

</form><br>
<div class="table-responsive" id="tab">
  <table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Tabla</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Valor</th>
        <th scope="col">Fecha de creación</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($alertas as $alerta)
      <tr>

        <td>{{$alerta->id}}</td>
        <td>{{$alerta->tabla}}</td>
        <td>{{$alerta->descripcion}}</td>
        <td>{{ number_format($alerta->valor,1) }}</td>
        <td>{{$alerta->created_at}}</td>
      </tr>

      @endforeach
    </tbody>
  </table>
</div>


<div class="alert alert-dark alert-sm" role="alert">
  <h4 class="alert-heading">Descarga el reporte.</h4><br>
  <style>
    .asf {
      display: flex;

    }
  </style>



  <form class="form-inline " method="get" action="{{route('descargarPDFalerts')}}">
    <label>Fecha Desde:</label>
    <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
    <label>Hasta</label>
    <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>

    <div class="asf">
      <button class="btn btn-dark" name="search">
        <i class="fa fa-download"></i></button> &nbsp;

  </form>


  <form class=" form-inline" action="{{route('cindex')}}">

    <div id="datform">
    </div>
    <div id="datform1">
    </div>

    <button class="btn btn-dark"><i class="fa fa-envelope"></i></button>
  </form>

</div>
</div>
<hr><br>
<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">


    <h3>Consulta todas las tablas aquí:</h3>

    <form class="form-inline" method="get" action="{{route('alertas')}}">

      <select name="slcm1" id="slcm1" class="form-control">

        <option value="">Selecciona el módulo</option>
        <option value="temperatura1">Temperatura</option>
        <option value="vibracion1">Vibración</option>
        <option value="gfases">Energía-fases</option>
        <option value="gfye">Energía-frecuencia y energía</option>
        <option value="gpotencias">Energía-potencias</option>
        <option value="gvolts">Energía-volts</option>
      </select>


      <label>Fecha Desde:</label>
      <input type="date" class="form-control" placeholder="Start" id="fecha_ini1" name="fecha_ini1" />
      <label>Hasta</label>
      <br>

      <input type="date" class="form-control" placeholder="End" id="fecha_fin1" name="fecha_fin1" /><br>
      <button class="btn btn-dark" name="search"><span class="glyphicon glyphicon-search">Consultar</span></button>

    </form><br>
  </div>
</section><!-- End Cta Section -->
@if($tabla1 == 'temperatura1')
<div class="table-responsive">
  <table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Temperatura</th>
        <th scope="col">Fecha de creación</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($otrasv as $otras)
      <tr>
        <td>{{$otras->id}}</td>
        <td>{{ number_format($otras->temp,1) }}</td>
        <td>{{$otras->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endif
@if($tabla1 == 'vibracion1')
<table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Eje X</th>
      <th scope="col">Eje Y</th>
      <th scope="col">Eje Z</th>
      <th scope="col">Fecha de creación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($otrasv as $otras)
    <tr>
      <td>{{$otras->id}}</td>
      <td>{{ number_format($otras->ejex,1) }}</td>
      <td>{{ number_format($otras->ejey,1) }}</td>
      <td>{{ number_format($otras->ejez,1) }}</td>
      <td>{{$otras->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@if($tabla1 == 'gfases')
<table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Fase 1A(A)</th>
      <th scope="col">Fase 2A(A)</th>
      <th scope="col">Fase 3A(A)</th>
      <th scope="col">Fecha de creación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($otrasv as $otras)
    <tr>
      <td>{{$otras->id}}</td>
      <td>{{ number_format($otras->fase1A,1) }}</td>
      <td>{{ number_format($otras->fase2A,1) }}</td>
      <td>{{ number_format($otras->fase3A,1) }}</td>
      <td>{{$otras->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@if($tabla1 == 'gfye')
<table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Frecuencia (HZ)</th>
      <th scope="col">Energia Activa (KWH)</th>
      <th scope="col">Energia Reactiva (KVARH)</th>
      <th scope="col">Fecha de creación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($otrasv as $otras)
    <tr>
      <td>{{$otras->id}}</td>
      <td>{{ number_format($otras->hz,1) }}</td>
      <td>{{ number_format($otras->energiaa,1) }}</td>
      <td>{{ number_format($otras->energiar,1) }}</td>
      <td>{{$otras->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@if($tabla1 == 'gpotencias')
<table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Potencia Total Reactiva (KVAR)</th>
      <th scope="col">Factor De Potencia (%)</th>
      <th scope="col">Potencia Total Activa (KW)</th>
      <th scope="col">Consumo Total (KW)</th>
      <th scope="col">Fecha de creación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($otrasv as $otras)
    <tr>
      <td>{{$otras->id}}</td>
      <td>{{ number_format($otras->pottreactiva,1) }}</td>
      <td>{{ number_format($otras->facpotencia,1) }}</td>
      <td>{{ number_format($otras->pottactiva,1) }}</td>
      <td>{{ number_format($otras->consumo_total,1) }}</td>
      <td>{{$otras->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@if($tabla1 == 'gvolts')
<table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Volts L2 (V)</th>
      <th scope="col">Volts L2 (V)</th>
      <th scope="col">Volts L2 (V)</th>
      <th scope="col">Fecha de creación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($otrasv as $otras)
    <tr>
      <td>{{$otras->id}}</td>
      <td>{{ number_format($otras->voltsL1,1) }}</td>
      <td>{{ number_format($otras->voltsL2,1) }}</td>
      <td>{{ number_format($otras->voltsL3,1) }}</td>
      <td>{{$otras->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
<script>
  if ($('#datform').is(":visible")) {
    $('#datform').css('display', 'none');
  } else {
    $('#datform').css('display', 'block');
  }

  if ($('#datform1').is(":visible")) {
    $('#datform1').css('display', 'none');
  } else {
    $('#datform1').css('display', 'block');
  }

  $('#fecha_ini1').change(function() {
    var date1 = $(this).val();
    $('#datform').html("<input value='" + date1 + "' type='date' id='fecha_ini1' name='fecha_ini1'>");
    console.log('ok');

    $('#datform').css('visibility', 'visible');


  });

  $('#fecha_fin1').change(function() {
    var date2 = $(this).val();
    $('#datform1').html("<input value='" + date2 + "' type='date'  id='fecha_fin1' name='fecha_fin1'>");
    $('datform1').hide();

  });

  function showtable() {
    document.getElementById('tab').style.display = 'block';
  }
  function showtable(e) {
    e.preventDefault();
}
</script>

@endsection