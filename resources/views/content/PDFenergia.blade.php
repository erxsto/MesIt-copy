<html>

<body>

    <head>
        <img style="width:9.375em;" class="logo" src="{{public_path('img/logo-amats.svg')}}" alt="amats_logo">

        <hr>
    </head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid;
        }
    </style>

    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fase 1A(A)</th>
                <th>Fase 2A(A)</th>
                <th>Fase 3A(A)</th>
                <th>Volts L1 (V)</th>
                <th>Volts L2 (V)</th>
                <th>Volts L3 (V)</th>
                <th>Frecuencia (HZ)</th>
                <th>Factor De Potencia (%)</th>
                <th>Potencia Total Activa (KW)</th>
                <th>Potencia Total Reactiva (KVAR)</th>
                <th>Energia Activa (KWH)</th>
                <th>Energia Reactiva (KVARH)</th>
                <th>Fecha de creación</th>
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