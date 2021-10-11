
@extends('layouts.index')
@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        
        var data = google.visualization.arrayToDataTable
            ([['Ampers', 'Fase1A'],
          ['1',  2.5     ],
          ['2',  4.8    ],
          ['3',  5.375   ],
          ['4',  6.1     ],
          ['5',  6.1     ],
          ['6',  6.1     ],
          ['7',  6.1     ],
          ['8',  6.1     ],
          ['9',  6.1     ],
          ['ACTUAL (10)',  6.1  ],
        
        ]);

        var options = {
          title: 'Fase1A',
          hAxis: { minValue: 0, maxValue: 9 },
          curveType: 'function',
          pointSize: 15,
        };

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
      
      data.setValue(0, 1, Respuesta[9].fase1A);
      data.setValue(1, 1, Respuesta[8].fase1A);
      data.setValue(2, 1, Respuesta[7].fase1A);
      data.setValue(3, 1, Respuesta[6].fase1A);
      data.setValue(4, 1, Respuesta[5].fase1A);
      data.setValue(5, 1, Respuesta[4].fase1A);
      data.setValue(6, 1, Respuesta[3].fase1A);
      data.setValue(7, 1, Respuesta[2].fase1A);
      data.setValue(8, 1, Respuesta[1].fase1A);
      data.setValue(9, 1, Respuesta[0].fase1A);
           
      chart.draw(data, options);
    }, 1300);
  
}
    
  </script>
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        
        var data = google.visualization.arrayToDataTable
            ([['Ampers', 'Fase2A', { role: 'style'}],
          ['1',  2.5    , 'gold'],
          ['2',  4.8    ,'gold'],
          ['3',  5.375   ,'gold'],
          ['4',  6.1     ,'gold'],
          ['5',  6.1     ,'gold'],
          ['6',  6.1     ,'gold'],
          ['7',  6.1     ,'gold'],
          ['8',  6.1     ,'gold'],
          ['9',  6.1     ,'gold'],
          ['ACTUAL (10)',  6.1 ,'gold' ],
        
        ]);

        var options = {
          title: 'Fase2A',
          hAxis: { minValue: 0, maxValue: 9 },
          curveType: 'function',
          pointSize: 15,
          colors: ['gold']
        };

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
      
      data.setValue(0, 1, Respuesta[9].fase1A);
      data.setValue(1, 1, Respuesta[8].fase1A);
      data.setValue(2, 1, Respuesta[7].fase1A);
      data.setValue(3, 1, Respuesta[6].fase1A);
      data.setValue(4, 1, Respuesta[5].fase1A);
      data.setValue(5, 1, Respuesta[4].fase1A);
      data.setValue(6, 1, Respuesta[3].fase1A);
      data.setValue(7, 1, Respuesta[2].fase1A);
      data.setValue(8, 1, Respuesta[1].fase1A);
      data.setValue(9, 1, Respuesta[0].fase1A);
           
      chart.draw(data, options);
    }, 1300);
  
}
    
  </script>
<div id="chart_div" style="width: 900px; height: 300px;"></div>
<BR>
<div id="chart_div2" style="width: 900px; height: 300px;"></div>

@endsection