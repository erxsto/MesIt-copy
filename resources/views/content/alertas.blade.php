@extends('layouts.index')
@section('content')
@include('content.tempguardaralerta')
@include('content.vibracionguardaralerta')


<center><br>
  <h5>Consulta de Historial de Alertas</h5><br><br>
</center>

<br>
<br>

<form class="form-inline" method="get" action="{{route('alertas')}}">

  <select name="slcm" id="slcm" class="form-control">

    <option value="">-- Selecciona el módulo --</option>
    <option value="temperatura">Temperatura</option>
    <option value="vibracion">Vibración</option>

  </select>


  <label>Fecha Desde:</label>
  <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
  <label>Hasta</label>
  <br>

  <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
  <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search">Consultar</span></button>

</form><br>
@if(isset($tabla))
@if($tabla=='temperatura')

<div class="table-responsive">
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

@elseif($tabla=='vibracion')

<div class="table-responsive">
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
      @endif
      @else
      <div class="table-responsive">
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

      @endif
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
    <input type="date" class="form-control" placeholder="Start" id="fecha_ini1" name="fecha_ini1" />
    <label>Hasta</label>
    <input type="date" class="form-control" placeholder="End" id="fecha_fin1" name="fecha_fin1" /><br>

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
</script>

@endsection