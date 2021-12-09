@extends('layouts.index')
@section('content')
@include('content.cortos')
@include('content.tempguardaralerta')
@include('content.vibracionguardaralerta')

<center>
<br>
<h4>Envio de Correo</h4>
<br>
<br>
<form action="{{route('cstore')}}" method="post">

    @csrf

        <input type="text" value="{{$fi}}" id="fecha_ini11" name="fecha_ini11">
        <input type="text" value="{{$ff}}" id="fecha_fin11" name="fecha_fin11">
        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        @error('name')
        <p><strong>{{$message}}</strong></p>
        @enderror
        
        <label>
            Correo:
            <br>
            <input type="text" name="correo">
        </label>
        <br>
        @error('correo')
        <p><strong>{{$message}}</strong></p>
        @enderror
        
        <label>
            Mensaje:
            <br>
            <textarea name="mensaje"></textarea>
        </label>
        <br>
        @error('mensaje')
        <p><strong>{{$message}}</strong></p>
        @enderror

        <button type="submit">Enviar Mensaje</button>
</form>
</center>
<script>
if( $('#fecha_ini11').is(":visible") ) {
        $('#fecha_ini11').css('display', 'none'); 
      } else {
        $('#fecha_ini11').css('display', 'block');
      }

      if( $('#fecha_fin11').is(":visible") ) {
        $('#fecha_fin11').css('display', 'none'); 
      } else {
        $('#fecha_fin11').css('display', 'block');
      }
</script>

@endsection