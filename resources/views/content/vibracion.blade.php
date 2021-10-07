@extends('layouts.index')
@section('content')
<!-- Se muestra la gráfica con <canvas> -->
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
                borderColor: '#fe0000',
                backgroundColor: 'rgba(254, 0, 0, 0.07)',
                pointStyle: 'circle',
                fill: true,
                //cubicInterpolationMode: 'monotone',
            }, {
                label: 'Eje Y',
                data: [],
                borderWidth: 3,
                borderColor: '#00ffff',
                backgroundColor: 'rgba(0, 255, 255, 0.07)',
                pointStyle: 'circle',
                //cubicInterpolationMode: 'monotone',
                fill: true,
            }, {
                label: 'Eje Z',
                data: [],
                borderWidth: 3,
                borderColor: '#008f39',
                backgroundColor: 'rgba(0, 143, 57, 0.07)',
                pointStyle: 'circle',
                //cubicInterpolationMode: 'monotone',
                fill: true,
            }]
        },
        //Propiedades de la gráfica
        options: {
            responsive: true,
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
                    color: 'black',
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
                        text: 'ID',
                        color: 'black',
                        font: {
                            size: 15,
                            weight: 'bold',
                            lineHeight: 1.2,
                        },
                    },
                    ticks: {
                        color: 'black',
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'VALORES',
                        color: 'black',
                        font: {
                            size: 15,
                            weight: 'bold',
                            lineHeight: 1.2,
                        },
                    },
                    ticks: {
                        color: 'black',
                    }
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
            //Se actualizan los 3 ejes.
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
    //Se actualizada cada ('1000')
    updateChart();
    setInterval(() => {
        updateChart();
    }, 1000);
</script>
<!-- Script advertencia-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    var setData = function() {
        $.ajax({
            url: "/api/datavibracion",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data >= 1.5) {
                    Swal.fire({
                        icon: 'warning',
                        title: '¡Advertencia!',
                        text: 'Ha sobresalido de 1.5',
                    });
                } else if (data >= 2.9) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Alerta crítica',
                        text: 'Ha sobresalido de 2.9',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
                    })
                };
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
    setData();
</script>
@endsection