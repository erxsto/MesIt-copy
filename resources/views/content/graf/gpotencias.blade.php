@extends('layouts.index')
@section('content')

<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Ampers', 'Potencia total reactiva'],
      ['', 2.5],
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

      data.setValue(0, 1, (Respuesta[9].pottreactiva) / 10);
      data.setValue(1, 1, (Respuesta[8].pottreactiva) / 10);
      data.setValue(2, 1, (Respuesta[7].pottreactiva) / 10);
      data.setValue(3, 1, (Respuesta[6].pottreactiva) / 10);
      data.setValue(4, 1, (Respuesta[5].pottreactiva) / 10);
      data.setValue(5, 1, (Respuesta[4].pottreactiva) / 10);
      data.setValue(6, 1, (Respuesta[3].pottreactiva) / 10);
      data.setValue(7, 1, (Respuesta[2].pottreactiva) / 10);
      data.setValue(8, 1, (Respuesta[1].pottreactiva) / 10);
      data.setValue(9, 1, (Respuesta[0].pottreactiva) / 10);

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
      ['Ampers', 'Factor de potencia', {
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

      data.setValue(0, 1, (Respuesta[9].facpotencia) / 1000);
      data.setValue(1, 1, (Respuesta[8].facpotencia) / 1000);
      data.setValue(2, 1, (Respuesta[7].facpotencia) / 1000);
      data.setValue(3, 1, (Respuesta[6].facpotencia) / 1000);
      data.setValue(4, 1, (Respuesta[5].facpotencia) / 1000);
      data.setValue(5, 1, (Respuesta[4].facpotencia) / 1000);
      data.setValue(6, 1, (Respuesta[3].facpotencia) / 1000);
      data.setValue(7, 1, (Respuesta[2].facpotencia) / 1000);
      data.setValue(8, 1, (Respuesta[1].facpotencia) / 1000);
      data.setValue(9, 1, (Respuesta[0].facpotencia) / 1000);

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
      ['Ampers', 'Potencia total activa', {
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

      data.setValue(0, 1, (Respuesta[9].pottactiva) / 10);
      data.setValue(1, 1, (Respuesta[8].pottactiva) / 10);
      data.setValue(2, 1, (Respuesta[7].pottactiva) / 10);
      data.setValue(3, 1, (Respuesta[6].pottactiva) / 10);
      data.setValue(4, 1, (Respuesta[5].pottactiva) / 10);
      data.setValue(5, 1, (Respuesta[4].pottactiva) / 10);
      data.setValue(6, 1, (Respuesta[3].pottactiva) / 10);
      data.setValue(7, 1, (Respuesta[2].pottactiva) / 10);
      data.setValue(8, 1, (Respuesta[1].pottactiva) / 10);
      data.setValue(9, 1, (Respuesta[0].pottactiva) / 10);

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
      ['Ampers', 'Consumo total', {
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

    var chart = new google.visualization.LineChart(document.getElementById('chart_div4'));
    chart.draw(data, options);

    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/grafs",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta = jQuery.parseJSON(JSON);

      data.setValue(0, 1, (Respuesta[9].consumo_total) / 10);
      data.setValue(1, 1, (Respuesta[8].consumo_total) / 10);
      data.setValue(2, 1, (Respuesta[7].consumo_total) / 10);
      data.setValue(3, 1, (Respuesta[6].consumo_total) / 10);
      data.setValue(4, 1, (Respuesta[5].consumo_total) / 10);
      data.setValue(5, 1, (Respuesta[4].consumo_total) / 10);
      data.setValue(6, 1, (Respuesta[3].consumo_total) / 10);
      data.setValue(7, 1, (Respuesta[2].consumo_total) / 10);
      data.setValue(8, 1, (Respuesta[1].consumo_total) / 10);
      data.setValue(9, 1, (Respuesta[0].consumo_total) / 10);

      chart.draw(data, options);
    }, 1300);

  }
</script>
<div class="gfases ">

  <div class="ch1" id="chart_div" style="width:1000px; height: 500px;"></div>
  <BR><BR>
  <div class="ch2" id="chart_div2" style="width: 1000px; height: 500px;"></div>
</div>
<div class="ch3" id="chart_div3" style="width: 1000px; height: 500px;"></div>
</div>
<div class="ch4" id="chart_div4" style="width: 1000px; height: 500px;"></div>
</div>
<!-- CONSULTAS -->
<form class="form-inline" method="get" action="{{route('gpotencias')}}">
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
                <th scope="col">Potencia Total Reactiva (KVAR)</th>
                <th scope="col">Factor De Potencia (%)</th>
                <th scope="col">Potencia Total Activa (KW)</th>
                <th scope="col">Consumo Total (KW)</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graficas as $grafica)
            <tr>
                <td>{{$grafica->id}}</td>
                <td>{{ number_format($grafica->pottreactiva,1) }}</td>
                <td>{{ number_format($grafica->facpotencia,1) }}</td>
                <td>{{ number_format($grafica->pottactiva,1) }}</td>
                <td>{{ number_format($grafica->consumo_total,1) }}</td>
                <td>{{$grafica->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="alert alert-dark alert-sm" role="alert">
    <h4 class="alert-heading">Descarga el reporte.</h4><br>
    <form class="form-inline" method="get" action="{{route('descargarPDFep')}}">
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