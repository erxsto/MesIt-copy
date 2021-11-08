<audio id="xyz" src="error.mp3" preload="auto"></audio>
<!-- FORM guardar registros alertas -->
<form id="formsave_at"method="post" action="{{route('save_at')}}">

</form>
<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ALERTA TEMPERATURA -->
<script type="text/javascript">
    setInterval(function() {
      var JSON = $.ajax({
        url: "/api/datatemp",
        dataType: 'json',
        method: 'GET',
        async: false
      }).responseText;
      var Respuesta1 = jQuery.parseJSON(JSON);
      if (Respuesta1[0].temp >= 30) {
                    
                      document.getElementById('xyz').muted = false;
                      document.getElementById('xyz').play();
                      var tabla = "temperatura";
                      var descripcion= "Alerta critica Temperatura";
                      var valor = Respuesta1[0].temp;
                    
                      document.getElementById("formsave_at").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1' class='t1' name='tabla' value='"+tabla+"'>"+ "<br><input id='d1' type='hidden' name='descripcion' value='"+descripcion+"'><input id='valor' type='hidden' name='valor' value='"+valor+"'><button style='{display:none;}' type='button' id='send'> ola";
                      $('#send').hide();
                      setTimeout(() => {
                        $('#send').click();
                      }, 3000);                   
                       
                        
                    $('#send').on('click',function(e){
                    
                    // var datos = $(this).serializeArray();
                    // datos.push({name: 'tag', value: 'formulariosave'});
                        var tabla = $('#t1').val();
                        var descripcion= $('#d1').val();
                        var valor= $('#valor').val();
                        var _token = $("input[name=_token]").val();
                        ruta = $('#formsave_at').attr('action');

                    $.ajax({
                      url: ruta,
                      type: 'POST',
                      dateType: 'json',
                      data: {
                        tabla: tabla,
                        descripcion: descripcion,
                        valor:valor,
                        _token: _token
                      },
                      success:function(response){
                        if(response){
                          console.log('ok');
                        }
                      },error:function(response){console.error();}
                    

                  });
                  });
                  
                    Swal.fire({
                        icon: 'error',
                        title: 'Alerta crítica',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        text: 'Temperatura mayor a 30!',
                        width: 600,
                        padding: '3em',
                        backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `,
                    });
                    
                    
               $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");    
               $('#notificaciones').on('click',function(e){
               $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");    

               });

      } else{

               
               $('#notificaciones').on('click',function(e){
               $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");    

               });

      }
        
    }, 3000);
          
</script>