@extends('layouts.index')
@section('content')
<!-- Script advertencia-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Se muestra la gráfica con <canvas> -->
<canvas id="myChart"></canvas>
<audio id="xyz" src="error.mp3" preload="auto"></audio>
<form class="form-inline" method="get" action="{{route('vibracion')}}">
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
                <th scope="col">Eje X</th>
                <th scope="col">Eje Y</th>
                <th scope="col">Eje Z</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graficas as $grafica)
            <tr>
                <td>{{$grafica->id}}</td>
                <td>{{ number_format($grafica->ejex,1) }}</td>
                <td>{{ number_format($grafica->ejey,1) }}</td>
                <td>{{ number_format($grafica->ejez,1) }}</td>
                <td>{{$grafica->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="alert alert-dark alert-sm" role="alert">
    <h4 class="alert-heading">Descarga el reporte.</h4><br>
    <form class="form-inline" method="get" action="{{route('descargarPDFv')}}">
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
                mode: 'point',
                intersect: false,
                axis: 'x'
            },
            plugins: {
                tooltip: {
                    enabled: true
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
<!-- Script alerta del eje X -->
<script type="text/javascript">
    var setData1 = function() {
        $.ajax({
            url: "/api/dataalertx",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.data[0] >= 2.9) {
                    document.getElementById('xyz').muted = false;
                    document.getElementById('xyz').play();
                    Swal.fire({
                        icon: 'error',
                        title: 'Alerta crítica',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Ha sobresalido el Eje X a más de 2.9',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
                    });

                } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
                    document.getElementById('xyz').muted = false;
                    document.getElementById('xyz').play();
                    Swal.fire({
                        icon: 'warning',
                        title: '¡Advertencia!',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Ha sobresalido el Eje X a más de 1.5',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(255, 223, 0,0.25)
                        left top
                        no-repeat
                        `
                    });

                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
    setData1();
    setInterval(() => {
        setData1();
    }, 3000);
</script>
<!-- Script alerta del eje Z -->
<script type="text/javascript">
    var setData2 = function() {
        $.ajax({
            url: "/api/dataalertz",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.data[0] >= 2.9) {
                    document.getElementById('xyz').muted = false;
                    document.getElementById('xyz').play();
                    Swal.fire({
                        icon: 'error',
                        title: 'Alerta crítica',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Ha sobresalido el Eje Z a más de 2.9',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
                    });
                } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
                    document.getElementById('xyz').muted = false;
                    document.getElementById('xyz').play();
                    Swal.fire({
                        icon: 'warning',
                        title: '¡Advertencia!',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Ha sobresalido el Eje Z a más de 1.5',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(255, 223, 0,0.25)
                        left top
                        no-repeat
                        `
                    });
                }

            },
            error: function(data) {
                console.log(data);
            }
        });
    }
    setData2();
    setInterval(() => {
        setData2();
    }, 3000);
</script>
<!-- Script alerta del eje Y -->
<script type="text/javascript">
    var setData3 = function() {
        $.ajax({
            url: "/api/dataalerty",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.data[0] >= 2.9) {
                    document.getElementById('xyz').muted = false;
                    document.getElementById('xyz').play();
                    Swal.fire({
                        icon: 'error',
                        title: 'Alerta crítica',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Ha sobresalido el Eje Y a más de 2.9',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
                    });
                } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
                    document.getElementById('xyz').muted = false;
                    document.getElementById('xyz').play();
                    Swal.fire({
                        icon: 'warning',
                        title: '¡Advertencia!',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Ha sobresalido el Eje Y a más de 1.5',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(255, 223, 0,0.25)
                        left top
                        no-repeat
                        `
                    });
                }

            },
            error: function(data) {
                console.log(data);
            }
        });
    }
    setData3();
    setInterval(() => {
        setData3();
    }, 3000);
</script>
@endsection