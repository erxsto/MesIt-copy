@extends('layouts.index')
@section('content')

<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Ampers', 'Frecuencia'],
      ['1', 2.5],
      ['2', 4.8],
      ['3', 5.375],
      ['4', 6.1],
      ['5', 6.1],
      ['6', 6.1],
      ['7', 6.1],
      ['8', 6.1],
      ['9', 6.1],
      ['ACTUAL (10)', 6.1],

    ]);
    var ancho = screen.width;
    if (ancho <= 480) {

      var options = {

        hAxis: {
          minValue: 0,
          maxValue: 9
        },
        curveType: 'function',
        pointSize: 5,
      };

    } else {

      var options = {

        hAxis: {
          minValue: 0,
          maxValue: 9
        },
        curveType: 'function',
        pointSize: 12,
      };

    }

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);

    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/grafs",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta = jQuery.parseJSON(JSON);

      data.setValue(0, 1, (Respuesta[9].hz) / 10);
      data.setValue(1, 1, (Respuesta[8].hz) / 10);
      data.setValue(2, 1, (Respuesta[7].hz) / 10);
      data.setValue(3, 1, (Respuesta[6].hz) / 10);
      data.setValue(4, 1, (Respuesta[5].hz) / 10);
      data.setValue(5, 1, (Respuesta[4].hz) / 10);
      data.setValue(6, 1, (Respuesta[3].hz) / 10);
      data.setValue(7, 1, (Respuesta[2].hz) / 10);
      data.setValue(8, 1, (Respuesta[1].hz) / 10);
      data.setValue(9, 1, (Respuesta[0].hz) / 10);

      chart.draw(data, options);
    }, 1000);

  }
</script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Ampers', 'Energia activa', {
        role: 'style'
      }],
      ['1', 2.5, 'gold'],
      ['2', 4.8, 'gold'],
      ['3', 5.375, 'gold'],
      ['4', 6.1, 'gold'],
      ['5', 6.1, 'gold'],
      ['6', 6.1, 'gold'],
      ['7', 6.1, 'gold'],
      ['8', 6.1, 'gold'],
      ['9', 6.1, 'gold'],
      ['ACTUAL (10)', 6.1, 'gold'],

    ]);

    var ancho = screen.width;

    if (ancho <= 480) {

      var options = {

        hAxis: {
          minValue: 0,
          maxValue: 9
        },
        curveType: 'function',
        pointSize: 5,
        colors: ['gold']
      };

    } else {

      var options = {

        hAxis: {
          minValue: 0,
          maxValue: 9
        },
        curveType: 'function',
        pointSize: 12,
        colors: ['gold']
      };

    }

    var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
    chart.draw(data, options);

    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/grafs",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta = jQuery.parseJSON(JSON);

      data.setValue(0, 1, (Respuesta[9].energiaa) / 10);
      data.setValue(1, 1, (Respuesta[8].energiaa) / 10);
      data.setValue(2, 1, (Respuesta[7].energiaa) / 10);
      data.setValue(3, 1, (Respuesta[6].energiaa) / 10);
      data.setValue(4, 1, (Respuesta[5].energiaa) / 10);
      data.setValue(5, 1, (Respuesta[4].energiaa) / 10);
      data.setValue(6, 1, (Respuesta[3].energiaa) / 10);
      data.setValue(7, 1, (Respuesta[2].energiaa) / 10);
      data.setValue(8, 1, (Respuesta[1].energiaa) / 10);
      data.setValue(9, 1, (Respuesta[0].energiaa) / 10);

      chart.draw(data, options);
    }, 1300);

  }
</script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Ampers', 'Energia Reactiva', {
        role: 'style'
      }],
      ['1', 2.5, 'red'],
      ['2', 4.8, 'red'],
      ['3', 5.375, 'red'],
      ['4', 6.1, 'red'],
      ['5', 6.1, 'red'],
      ['6', 6.1, 'red'],
      ['7', 6.1, 'red'],
      ['8', 6.1, 'red'],
      ['9', 6.1, 'red'],
      ['ACTUAL (10)', 6.1, 'red'],

    ]);

    var ancho = screen.width;

    if (ancho <= 480) {

      var options = {

        hAxis: {
          minValue: 0,
          maxValue: 9
        },
        curveType: 'function',
        pointSize: 5,
        colors: ['red']
      };

    } else {

      var options = {

        hAxis: {
          minValue: 0,
          maxValue: 9
        },
        curveType: 'function',
        pointSize: 12,
        colors: ['red']
      };

    }

    var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
    chart.draw(data, options);

    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/grafs",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta = jQuery.parseJSON(JSON);

      data.setValue(0, 1, (Respuesta[9].energiar) / 10);
      data.setValue(1, 1, (Respuesta[8].energiar) / 10);
      data.setValue(2, 1, (Respuesta[7].energiar) / 10);
      data.setValue(3, 1, (Respuesta[6].energiar) / 10);
      data.setValue(4, 1, (Respuesta[5].energiar) / 10);
      data.setValue(5, 1, (Respuesta[4].energiar) / 10);
      data.setValue(6, 1, (Respuesta[3].energiar) / 10);
      data.setValue(7, 1, (Respuesta[2].energiar) / 10);
      data.setValue(8, 1, (Respuesta[1].energiar) / 10);
      data.setValue(9, 1, (Respuesta[0].energiar) / 10);

      chart.draw(data, options);
    }, 1300);

  }
</script>
<div class="gfases ">

  <div class="ch1" id="chart_div" style="width:1000px; height: 500px;"></div>
  <BR>
  <div class="ch2" id="chart_div2" style="width:1000px; height: 500px;"></div>
</div>
<div class="ch3" id="chart_div3" style="width:1000px; height: 500px;"></div>
<!-- CONSULTAS -->
<!-- <form class="form-inline" method="get" action="{{route('gfye')}}">
  <label>Fecha Desde:</label>
  <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
  <label>Hasta</label>
  <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
  <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search">Consultar</span></button>
</form><br>
<div class="table-responsive">
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
      @foreach ($graficas as $grafica)
      <tr>
        <td>{{$grafica->id}}</td>
        <td>{{ number_format($grafica->hz,1) }}</td>
        <td>{{ number_format($grafica->energiaa,1) }}</td>
        <td>{{ number_format($grafica->energiar,1) }}</td>
        <td>{{$grafica->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> -->
<div class="alert alert-dark alert-sm" role="alert">
  <h4 class="alert-heading">Descarga el reporte.</h4><br>
  <form class="form-inline" method="get" action="{{route('descargarPDFefe')}}">
    <label>Fecha Desde:</label>
    <input type="date" class="form-control" placeholder="Start" id="fecha_ini" name="fecha_ini" />
    <label>Hasta</label>
    <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
    <button class="btn btn-dark" name="search">
      <i class="fa fa-download"></i></button>
    <br>
  </form>
</div>
<script>
  window.onload = function() {
    var fecha = new Date();
    var mes = fecha.getMonth() + 1;
    var dia = fecha.getDate();
    var ano = fecha.getFullYear();
    if (dia < 10)
      dia = '0' + dia;
    if (mes < 10)
      mes = '0' + mes
    document.getElementById('fecha_fin').value = ano + "-" + mes + "-" + dia;
  }
</script>

@endsection