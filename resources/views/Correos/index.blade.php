@extends('layouts.index')
@section('content')

@include('content.sweetalerttemp-copy')
@include('content.sweetalertvib-copy')

<center>
<br>
<h4>Envio de Correo</h4>
<br>
<br>
<form action="{{route('cstore')}}" method="post">

    @csrf
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
@endsection