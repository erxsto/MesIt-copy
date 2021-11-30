<html>
<head>
    <img style="width:9.375em;" class="logo" src="{{asset('img/logo-amats.svg')}}" alt="amats_logo">
    <strong><text class="">AMATS ELECTRIC, S.A DE C.V.</text></strong>
    <text class="">-Soluciones Rentables en Automatización</text>
    <hr>
</head>


<div class="table-responsive">
  <table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Tabla</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Valor</th>
        <th scope="col">Fecha de creación</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ($alertas as $alerta)
      <tr>

        <td>{{$alerta->id}}</td>
        <td>{{$alerta->tabla}}</td>
        <td>{{$alerta->descripcion}}</td>
        <td>{{ number_format($alerta->valor,1) }}</td>
        <td>{{$alerta->created_at}}</td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
</div>

</body>

</html>