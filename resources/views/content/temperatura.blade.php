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

    var options = {
      width: 250,
      height: 250,
      redFrom: 90,
      redTo: 100,
      yellowFrom: 75,
      yellowTo: 90,
      minorTicks: 5
    };

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
    }, 1300);
  }
</script>
<center>
<div id="medidores">
</div>
</center>
@endsection