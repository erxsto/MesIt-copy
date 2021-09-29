@extends('layouts.index')
@section('content')
<div class="content">
<canvas id="myChart"></canvas>
    <!-- <table>
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
    </table> -->
</div>
</div>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Eje X',
                data: [],
                borderWidth: 3,
                borderColor: '#eb9c36',
                backgroundColor: 'rgba(235, 156, 54, 0.07)',
                pointStyle: 'circle',
                fill: true,
                //cubicInterpolationMode: 'monotone',
            }, {
                label: 'Eje Y',
                data: [],
                borderWidth: 3,
                borderColor: '#11400f',
                backgroundColor: 'rgba(17, 64, 15, 0.07)',
                pointStyle: 'circle',
                //cubicInterpolationMode: 'monotone',
                fill: true,
            }, {
                label: 'Eje Z',
                data: [],
                borderWidth: 3,
                borderColor: '#0871ca',
                backgroundColor: 'rgba(8, 113, 202, 0.07)',
                pointStyle: 'circle',
                //cubicInterpolationMode: 'monotone',
                fill: true,
            }]
        },
        options: {
            animations: {
                radius: {
                    duration: 400,
                    easing: 'linear',
                    loop: (context) => context.active
                }
            },
            hoverRadius: 10,
            hoverBackgroundColor: 'black',
            interaction: {
                mode: 'nearest',
                intersect: false,
                axis: 'x'
            },
            plugins: {
                tooltip: {
                    enabled: false
                },
                title: {
                    text: 'EJES',
                    display: true,
                },
                filler: {
                    propagate: true
                },
                'samples-filler-analyser': {
                    target: 'chart-analyser'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Id',
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: 'Datos',
                    },
                },
            },
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
            success: function(data, datay) {
                myChart.data.labels = data.labels;
                myChart.data.datasets[0].data = data.data;
                myChart.update();
                myChart.data.labels = data.labels;
                myChart.data.datasets[1].data = data.datay;
                myChart.update();
                myChart.data.labels = data.labels;
                myChart.data.datasets[2].data = data.dataz;
                myChart.update();
            },
            error: function(data) {
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