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
        <thead">
            <tr>
                <th>Id</th>
                <th>Frecuencia(Hz)</th>
                <th>Energia activa(KWH)</th>
                <th>Energia reactiva(KVARH)</th>
                <th>Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graficas as $grafica)
            <tr>
                <td>{{$grafica->id}}</td>
                <td>{{ number_format($grafica->hz,1) }}</td>
                <td>{{ number_format($grafica->energiaa,1) }}</td>
                <td>{{ number_format($grafica->energiar,1) }}</td>
                <td>{{$grafica->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>