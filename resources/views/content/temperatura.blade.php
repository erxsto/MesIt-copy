@extends('layouts.index')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['gauge']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['Temperatura', 0]
    ]);
    var ancho = screen.width;

    if (ancho <= 480) {
      var options = {
        width: 170,
        height: 170,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
      };
    } else if (ancho <= 900) {

      var options = {
        width: 200,
        height: 200,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
      };

    } else {

      var options = {
        width: 300,
        height: 300,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
      };
    }


    var chart = new google.visualization.Gauge(document.getElementById('medidores'));
    chart.draw(data, options);
    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/datatemp",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta = jQuery.parseJSON(JSON);
      data.setValue(0, 1, Respuesta[0].temp);
      chart.draw(data, options);
    }, 1000);




  }
</script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Temperatura', 'Celcius', 'Farenheit'],
      ['1', 8.4, 7.9],
      ['2', 8.4, 7.9],
      ['3', 8.4, 7.9],
      ['4', 8.4, 7.9],
      ['5', 8.4, 7.9],
      ['6', 8.4, 7.9],
      ['7', 8.4, 7.9],
      ['8', 8.4, 7.9],
      ['9', 8.4, 7.9],
      ['(ACTUAL) 10', 8.4, 7.9],
    ]);

    var options = {
      title: 'Histograma de Temperatura',
      vAxis: {
        title: 'Grados de Temperatura'
      },
      isStacked: true
    };

    var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);

    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/datacharttemp",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta = jQuery.parseJSON(JSON);

      // for(var i=0; i<=9;+i++){
      //   data.setValue(i,1,Respuesta[i].temp);
      //   data.setValue(i,2,Respuesta[i].far);
      // }
      data.setValue(0, 1, Respuesta[9].temp);
      data.setValue(0, 2, Respuesta[9].far);
      data.setValue(1, 1, Respuesta[8].temp);
      data.setValue(1, 2, Respuesta[8].far);
      data.setValue(2, 1, Respuesta[7].temp);
      data.setValue(2, 2, Respuesta[7].far);
      data.setValue(3, 1, Respuesta[6].temp);
      data.setValue(3, 2, Respuesta[6].far);
      data.setValue(4, 1, Respuesta[5].temp);
      data.setValue(4, 2, Respuesta[5].far);
      data.setValue(5, 1, Respuesta[4].temp);
      data.setValue(5, 2, Respuesta[4].far);
      data.setValue(6, 1, Respuesta[3].temp);
      data.setValue(6, 2, Respuesta[3].far);
      data.setValue(7, 1, Respuesta[2].temp);
      data.setValue(7, 2, Respuesta[2].far);
      data.setValue(8, 1, Respuesta[1].temp);
      data.setValue(8, 2, Respuesta[1].far);
      data.setValue(9, 1, Respuesta[0].temp);
      data.setValue(9, 2, Respuesta[0].far);
      chart.draw(data, options);
    }, 1000);
  }
</script>
<div class="contenedor">
  <main class="graficas chart_div1">
    <div class="grafica" id="medidores">
    </div>
    <div class="grafica chart_div" id="chart_div"></div>
  </main>
</div>
<form class="form-inline" method="get" action="{{route('temperatura')}}">
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
        <th scope="col">Temperatura</th>
        <th scope="col">Fecha de creación</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($graficas as $grafica)
      <tr>
        <td>{{$grafica->id}}</td>
        <td>{{ number_format($grafica->temp,1) }}</td>
        <td>{{$grafica->created_at}}</td>
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