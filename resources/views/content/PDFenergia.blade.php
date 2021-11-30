<html>
<head>
    <img style="width:9.375em;" class="logo" src="{{asset('img/logo-amats.svg')}}" alt="amats_logo">
    <strong><text class="">AMATS ELECTRIC, S.A DE C.V.</text></strong>
    <text class="">-Soluciones Rentables en Automatización</text>
    <hr>
</head>

<body>
    <br><br>
    <table class="table table-bordered" id="order-listing" width="50%">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Fase 1A(A)</th>
                <th scope="col">Fase 2A(A)</th>
                <th scope="col">Fase 3A(A)</th>
                <th scope="col">Volts L1 (V)</th>
                <th scope="col">Volts L2 (V)</th>
                <th scope="col">Volts L3 (V)</th>
                <th scope="col">Frecuencia (HZ)</th>
                <th scope="col">Factor De Potencia (%)</th>
                <th scope="col">Potencia Total Activa (KW)</th>
                <th scope="col">Potencia Total Reactiva (KVAR)</th>
                <th scope="col">Energia Activa (KWH)</th>
                <th scope="col">Energia Reactiva (KVARH)</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graficas as $grafica)
            <tr>
                <td>{{$grafica->id}}</td>
                <td>{{ number_format($grafica->fase1A,1) }}</td>
                <td>{{ number_format($grafica->fase2A,1) }}</td>
                <td>{{ number_format($grafica->fase3A,1) }}</td>
                <td>{{ number_format($grafica->voltsL1,1) }}</td>
                <td>{{ number_format($grafica->voltsL2,1) }}</td>
                <td>{{ number_format($grafica->voltsL3,1) }}</td>
                <td>{{ number_format($grafica->hz,1) }}</td>
                <td>{{ number_format($grafica->facpotencia,1) }}</td>
                <td>{{ number_format($grafica->pottactiva,1) }}</td>
                <td>{{ number_format($grafica->pottreactiva,1) }}</td>
                <td>{{ number_format($grafica->energiaa,1) }}</td>
                <td>{{ number_format($grafica->energiar,1) }}</td>
                <td>{{$grafica->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>