<<html>

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
<br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tabla</th>
                <th>Descripcion</th>
                <th>Valor</th>
                <th>Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alertas as $alerta)
            <tr>
                <td>{{$alerta->id}}</td>
                <td>{{$alerta->tabla}}</td>
                <td> {{$alerta->descripcion}}</td>
                <td> {{ number_format($alerta->valor,1) }}</td>
                <td> {{$alerta->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>