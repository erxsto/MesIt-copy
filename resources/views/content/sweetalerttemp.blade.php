<audio id="xyz" src="error.mp3" preload="auto"></audio>
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

      document.getElementById('xyz').muted = false;
      document.getElementById('xyz').play();

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

    } else {


    }

  }, 3000);
</script>