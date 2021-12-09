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
        <form id="form_horas"method="post" action="{{route('guardar_horas')}}">
        {!! csrf_field() !!}
        <tr>
            <td  class="text-center">
                <select name="hora_inicio" id="hora_inicio">
                <option value="">--- Selecciona una hora ----</option>
                    <option value="07:00">07:00 hrs</option>
                    <option value="08:00">08:00 hrs</option>
                    <option value="09:00">09:00 hrs</option>
                    <option value="10:00">10:00 hrs</option>
                    <option value="11:00">11:00 hrs</option>
                    <option value="12:00">12:00 hrs</option>
                    <option value="13:00">13:00 hrs</option>
                    <option value="14:00">14:00 hrs</option>
                    <option value="15:00">15:00 hrs</option>
                    <option value="16:00">16:00 hrs</option>
                    <option value="17:00">17:00 hrs</option>
                    <option value="18:00">18:00 hrs</option>
                    <option value="19:00">19:00 hrs</option>
                    <option value="20:00">20:00 hrs</option>
                    <option value="21:00">21:00 hrs</option>
                </select>
            </td> 
            <td  class="text-center">
                <select name="hora_fin" id="hora_fin">
                    <option value="">--- Selecciona una hora ----</option>
                    <option value="07:00">07:00 hrs</option>
                    <option value="08:00">08:00 hrs</option>
                    <option value="09:00">09:00 hrs</option>
                    <option value="10:00">10:00 hrs</option>
                    <option value="11:00">11:00 hrs</option>
                    <option value="12:00">12:00 hrs</option>
                    <option value="13:00">13:00 hrs</option>
                    <option value="14:00">14:00 hrs</option>
                    <option value="15:00">15:00 hrs</option>
                    <option value="16:00">16:00 hrs</option>
                    <option value="17:00">17:00 hrs</option>
                    <option value="18:00">18:00 hrs</option>
                    <option value="19:00">19:00 hrs</option>
                    <option value="20:00">20:00 hrs</option>
                    <option value="21:00">21:00 hrs</option>
                </select>
            </td>
            
        </tr>
        <tr>
            <td colspan="2" class=" text-center">
            <button type="button" class="btn btn-warning" id="enviarhoras">Guardar horario</button>
            </td>
        </tr>
           
  </table>  
        
        </form>
   
</center>
<script>

$("#enviarhoras").click(function(e){
    
   var hi = JSON.stringify($("#hora_inicio").val());
   var hf = JSON.stringify($("#hora_fin").val());

    $.ajax({
            type: 'POST',
            url: '{{route("guardar_horas")}}',
            data: 
                {
                    hi,hf
                }
            ,
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            success: function(data) {
                console.log('Hi : '+hi+ ' Hf : '+hf)
            },
            error: function(error){
                console.log('error');
            }
          });
});
</script>
<br>
    <div>
        <h5>Dias de Inactividad</h5>
        <br> 
        <p class=" alert-light">Selecciona tus días de descanso en los cuáles quieras dejar de recibir alertas.</p>
        <br>
        <center>
        <table style="border: 1px solid #636363;
                      width: 100%;
                      border-collapse: collapse;">

        <tr>
            <td colspan="7" class=" text-center" height="20">
            </td>
        </tr>
        <tr>    
            <td height="10">
                &nbsp;&nbsp;
                <input class="form-check-input" type="checkbox" name="lunes" value="" id="lunes">
                <label class="form-check-label" for="lunes">
                  &nbsp;&nbsp; Lunes &nbsp;&nbsp;
            </label>
            </td>    
        <td style="background: #C8EFF5;">    
            &nbsp;&nbsp;
            <input class="form-check-input" type="checkbox" name="martes" value="" id="martes">
            <label class="form-check-label" for="martes">
              &nbsp;&nbsp; Martes &nbsp;&nbsp;
        </label>
        </td>  
        <td>   
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" name="miercoles" value="" id="miercoles">
            <label class="form-check-label" for="miercoles">
              &nbsp;&nbsp; Miércoles &nbsp;&nbsp;
        </label>
        </td>  
        <td style="background: #C8EFF5;">    
            &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" name="jueves" value="" id="jueves">
            <label class="form-check-label" for="jueves">
              &nbsp;&nbsp; Jueves &nbsp;&nbsp;
        </label>
        </td>  
        <td>    
        &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" name="viernes" value="" id="viernes">
            <label class="form-check-label" for="viernes">
               &nbsp;&nbsp; Viernes &nbsp;&nbsp;
        </label>
        </td>  
        <td style="background: #C8EFF5;">    
            &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" name="sabado" value="" id="sabado">
            <label class="form-check-label" for="sabado">
              &nbsp;&nbsp; Sábado &nbsp;&nbsp;
        </label>
        </td>  
        <td height="40">    
        &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" name="domingo" value="" id="domingo">
            <label class="form-check-label" for="domingo">
              &nbsp;&nbsp; Domingo &nbsp;&nbsp;
        </label>
        </td>  
        </tr>
        <tr>
            <td colspan="7" class=" text-center" height="70">
            <button type="button" class="btn btn-warning" id="enviardias">Guardar horario</button>
            </td>
        </tr>
        </table>
    </center>
    </div>
    <script>
    
    $("#enviardias").click(function(e){
        if ($('#lunes').is(':checked')) {
        var lun = 1;

        }else{
        var lun = 0;
        }
        if ($('#martes').is(':checked')) {
        var mar = 1;

        }else{
        var mar = 0;
        }
        if ($('#miercoles').is(':checked')) {
        var mier = 1;

        }else{
        var mier = 0;
        }
        if ($('#jueves').is(':checked')) {
        var jue = 1;

        }else{
        var jue = 0;
        }
        if ($('#viernes').is(':checked')) {
        var vier = 1;

        }else{
        var vier = 0;
        }
        if ($('#sabado').is(':checked')) {
        var sab = 1;

        }else{
        var sab = 0;
        }
        if ($('#domingo').is(':checked')) {
        var dom = 1;

        }else{
        var dom = 0;
        }
     $.ajax({
             type: 'POST',
             url: '{{route("guardar_dias")}}',
             data: 
                 {
                     lun,mar,mier,jue,vier,sab,dom
                 }
             ,
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
             success: function(data) {
                 console.log(lun+'  '+ mar+ ' ' + mier+' '+jue+ ' '+vier+' '+sab+' '+dom)
             },
             error: function(error){
                 console.log('error');
             }
           });
 });
    </script>
    <br><br><br>

    <h5>Ó tal vez quieras... ¿Deseas desactivarlas por completo?</h5> <br>
    <button class="btn btn-danger" id="desactivar_alertas">Desactivar Alertas</button> &nbsp;&nbsp;&nbsp;
    <button class="btn btn-success" id="activar_alertas"> Activar Alertas</button>
    <br><br>
    <script>
       $('#desactivar_alertas').click(()=> { 
            
            $.ajax({
             type: 'POST',
             url: '{{route("status_alertas")}}',
             data: 0,
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
             success: function(data) {
                 console.log('Desactivadas')
             },
             error: function(error){
                 console.log('error');
             }
           });
       });
       $('#activar_alertas').click(()=> { 
            $.ajax({
             type: 'POST',
             url: '{{route("status_alertas")}}',
             data: 1,
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
             success: function(data) {
                 console.log('Activadas')
             },
             error: function(error){
                 console.log('error');
             }
           });
       });
    </script>
</div>
@endsection