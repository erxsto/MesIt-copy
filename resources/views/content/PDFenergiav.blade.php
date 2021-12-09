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
                <th scope="col">Volts L1 (V)</th>
                <th scope="col">Volts L2 (V)</th>
                <th scope="col">Volts L3 (V)</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graficas as $grafica)
            <tr>
                <td>{{$grafica->id}}</td>
                <td>{{ number_format($grafica->voltsL1,1) }}</td>
                <td>{{ number_format($grafica->voltsL2,1) }}</td>
                <td>{{ number_format($grafica->voltsL3,1) }}</td>
                <td>{{$grafica->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>