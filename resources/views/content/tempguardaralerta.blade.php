<!-- FORM guardar registros alertas -->
<form id="formsave_at" method="post" action="{{route('save_at')}}">

</form>
<!-- sweetalert2 -->
<script src="{{ asset ('js/sweetalert.js') }}"></script>
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



      var tablat = "temperatura";
      var descripciont = "Alerta crítica Temperatura mayor a 30!";
      var valort = Respuesta1[0].temp;

      $.ajax({
        url: '{{route("save_at")}}',
        type: 'POST',
        dateType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          tabla: tablat,
          descripcion: descripciont,
          valor: valort
        },

        success: function(response) {
          if (response) {
            console.log('ok , temp alerta guardada.');
          }
        },
        error: function(response) {
          console.error();
        }


      });


      $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");
      $('#notificaciones').on('click', function(e) {
        $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");

      });

    } else {

      $('#notificaciones').on('click', function(e) {
        $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");

      });

    }

  }, 3000);
</script>