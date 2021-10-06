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
        document.getElementById("indicador6").innerHTML = (Respuesta[0].hz) / 10;
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
<!-- Script de grafica temperatura -->
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
            <h2 class="titulo">Vibración</h2>
            <canvas id="myChart"></canvas>
        </div>
        <div class="grafica">
            <h2 class="titulo">Temperatura</h2>
            <div id="medidores">
            </div>
        </div>
        <div class="grafica">
            <h2 class="titulo">Energía</h2>
            <div class="a" href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="num" id="indicador10"></div>

                <hr> Energia activa (KWH)
            </div>
        </div>
        <div class="grafica">
            <h2 class="titulo">Energía</h2>
            <div class="a" href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="num" id="indicador6"></div>

                <hr> Frecuencia (Hz)
            </div>
        </div>
        <div class="grafica">
            <h2 class="titulo">Gráfica de temp</h2>
            <div id="chart_div"></div>
        </div>
        <div class="grafica">
            <h2 class="titulo">Energía</h2>
            <div class="a" href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="num" id="indicador11"></div>

                <hr> Energia reactiva (KVARH)
            </div>
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