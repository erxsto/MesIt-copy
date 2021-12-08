@extends('layouts.index')
@section('content')
@include('content.tempguardaralerta')
@include('content.vibracionguardaralerta')
<div class="align-items-center text-center">
    <h4>Define tus tiempos, elige en que horario deseas recibir notificaciones.</h4><br><br>
<center>
    <table class="table table-striped table-light">
    <thead>
        <tr class="text-center">
          
               
        
            <p class=" alert-light"> Selecciona Horarios en los que deseas recibir notificaciones.</p>
                
                   
        
        
            <td class="text-center table-dark">
           
            De:
            
            </td>
            
            <td class="text-center table-dark">
            
            A:    
            
            </td>
        
        </tr>
        </thead>

        <tr>
            <td  class="text-center">
                <select name="hora_inicio" id="hora_inicio">
                    <option value="07:00">07:00 hrs</option>
                </select>
            </td> 
            <td  class="text-center">
                <select name="hora_fin" id="hora_fin">
                    <option value="21:00" >21:00 hrs </p></option>
                </select>
            </td>
        </tr>
    </table>   
</center>
<br>
    <div>
        <h5>Dias de Inactividad</h5>
        <br> 
        <p class=" alert-light">Selecciona tus días de descanso en los cuáles quieras dejar de recibir alertas.</p>
        <br>
        <center>
        <table style="border: 2px solid #636363;
                      width: 100%;
                      border-collapse: collapse;">

        <tr>    
            <td>
                &nbsp;&nbsp;
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  &nbsp;&nbsp; Lunes &nbsp;&nbsp;
            </label>
            </td>    
        <td style="background: #C8EFF5;">    
            &nbsp;&nbsp;
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              &nbsp;&nbsp; Martes &nbsp;&nbsp;
        </label>
        </td>  
        <td>   
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              &nbsp;&nbsp; Miércoles &nbsp;&nbsp;
        </label>
        </td>  
        <td style="background: #C8EFF5;">    
            &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              &nbsp;&nbsp; Jueves &nbsp;&nbsp;
        </label>
        </td>  
        <td>    
        &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
               &nbsp;&nbsp; Viernes &nbsp;&nbsp;
        </label>
        </td>  
        <td style="background: #C8EFF5;">    
            &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              &nbsp;&nbsp; Sábado &nbsp;&nbsp;
        </label>
        </td>  
        <td height="40">    
        &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              &nbsp;&nbsp; Domingo &nbsp;&nbsp;
        </label>
        </td>  
        </tr>
        </table>
    </center>
    </div>
    <br><br><br>

    <h5>Ó tal vez quieras... ¿Deseas desactivarlas por completo?</h5> <br>
    <button class="btn btn-danger" id="desactivar_alertas">Desactivar Alertas</button> &nbsp;&nbsp;&nbsp;
    <button class="btn btn-success" id="activar_alertas"> Activar Alertas</button>
    <br><br>
</div>
@endsection