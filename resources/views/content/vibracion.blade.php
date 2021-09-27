@extends('layouts.index')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>VibracionN</h3>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <th>Id</th>
                <th>Eje X</th>
                <th>Eje Y</th>
                <th>Eje Z</th>
            </thead>
            <tbody>
                @foreach($grafica as $graficas)
                <tr>
                    <td>{{$graficas->id}}</td>
                    <td>{{$graficas->ejex}}</td>
                    <td>{{$graficas->ejey}}</td>
                    <td>{{$graficas->ejez}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'ejex',
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "/api/datavibracion",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.data;
        myChart.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }
  
  updateChart();
  setInterval(() => {
    updateChart();
  }, 1000);
</script>
@endsection