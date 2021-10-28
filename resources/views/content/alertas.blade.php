@extends('layouts.index')
@section('content')


  <center><br><h5>Consulta de Historial de Alertas</h5><br><br></center>
   <select name="" id="" class="form-control"> 

    <option value="">-- Selecciona el módulo --</option>
    <option value="temperatura">Temperatura</option>
    <option value="vibracion">Vibración</option>

    </select>

<br>
<br>
  
<form class="form-inline" method="get" action="{{route('alertas')}}">
<label>Fecha Desde:</label>
  <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
  <label>Hasta</label>
<br>
  
  <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
  <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search">Consultar</span></button>
</form><br>
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
      @foreach ($alertas as $alerta)
      <tr>
        <td>{{$alerta->id}}</td>
        <td>{{ number_format($alerta->valor,1) }}</td>
        <td>{{$alerta->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="alert alert-dark alert-sm" role="alert">
  <h4 class="alert-heading">Descarga el reporte.</h4><br>
  <form class="form-inline" method="get" action="{{route('descargarPDFt')}}">
    <label>Fecha Desde:</label>
    <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
    <label>Hasta</label>
    <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
    <button class="btn btn-dark" name="search">
      <i class="fa fa-download"></i></button>
    <br>
  </form>
</div>
@endsection