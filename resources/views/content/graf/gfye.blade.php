<form class="form-inline" method="get" action="{{route('gfye')}}">
    <label>Fecha Desde:</label>
    <input type="date" class="form-control" placeholder="Start" name="fecha_ini" />
    <label>Hasta</label>
    <input type="date" class="form-control" placeholder="End" id="fecha_fin" name="fecha_fin" /><br>
    <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search">Consultar</span></button>
    <a class="btn btn-dark" href="{{ route('descargarPDFefe') }}"><i class="fa fa-download"></i></a>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered" id="order-listing" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Frecuencia (HZ)</th>
                    <th scope="col">Energia Activa (KWH)</th>
                    <th scope="col">Energia Reactiva (KVARH)</th>
                    <th scope="col">Fecha de creación</th>
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
    </div>
    <div class="alert alert-dark alert-sm" role="alert">
  <h4 class="alert-heading">Descarga el reporte.</h4><br>
  <form class="form-inline" method="get" action="{{route('descargarPDFefe')}}">
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