<html>
<head>
    <img style="width:9.375em;" class="logo" src="http://amats.com.mx/images/logo-amats-electric-r.svg" alt="amats_logo">
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
                <th scope="col">Temperatura</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graficas as $grafica)
            <tr>
                <td>{{$grafica->id}}</td>
                <td>{{ number_format($grafica->temp,1) }}</td>
                <td>{{$grafica->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>