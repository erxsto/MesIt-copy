@extends('layouts.index')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Script energía -->
<script type="text/javascript">
    setInterval(function() {
        var JSON = $.ajax({

            url: "/api/dataenergia",
            dataType: 'json',
            method: 'GET',
            async: false
        }).responseText;
        var Respuesta = jQuery.parseJSON(JSON);


        document.getElementById("indicador").innerHTML = (Respuesta[0].fase1A) / 10;
        document.getElementById("indicador1").innerHTML = (Respuesta[0].fase2A) / 10;
        document.getElementById("indicador2").innerHTML = (Respuesta[0].fase3A) / 10;
        document.getElementById("indicador3").innerHTML = (Respuesta[0].voltsL1) / 10;
        document.getElementById("indicador4").innerHTML = (Respuesta[0].voltsL2) / 10;
        document.getElementById("indicador5").innerHTML = (Respuesta[0].voltsL3) / 10;
        document.getElementById("indicador6").innerHTML = (Respuesta[0].hz) / 10;
        document.getElementById("indicador7").innerHTML = (Respuesta[0].facpotencia) / 1000;
        document.getElementById("indicador8").innerHTML = (Respuesta[0].pottactiva) / 10;
        document.getElementById("indicador9").innerHTML = (Respuesta[0].pottreactiva) / 10;
        document.getElementById("indicador10").innerHTML = (Respuesta[0].energiaa) / 10;
        document.getElementById("indicador11").innerHTML = (Respuesta[0].energiar) / 10;


    }, 1700);
</script>
<!-- Script temperatura -->
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
<!-- Gráfica de vibración -->
<div class="contenedor">
    <header>
        <h1></h1>
    </header>
    <main class="graficas">
        <div class="grafica">
            <canvas id="myChart"></canvas>
        </div>
        <div class="grafica">
            <div id="medidores">
            </div>
        </div>
        <div class="grafica">
            <div class="a" href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="num" id="indicador"></div>

                <hr> FASE 1A (A)
            </div>
        </div>
        <div class="grafica">
        </div>
        <div class="grafica">
        </div>
        <div class="grafica">
        </div>
    </main>
</div>
<!-- Script de la gráfica de vibración -->
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
            url: "/api/datadashboard",
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