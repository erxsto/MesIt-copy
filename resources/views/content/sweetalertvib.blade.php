<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Script advertencia-->
<audio id="xyz" src="error.mp3" preload="auto"></audio>
<!-- ALERTAS VIBRACION -->
<!-- Script alerta del eje X -->
<script type="text/javascript">
  var setData1 = function() {
    $.ajax({
      url: "/api/dataalertx",
      type: 'GET',
      async: false,
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        if (data.data[0] >= 2.9) {


          document.getElementById('xyz').muted = false;
          document.getElementById('xyz').play();


          Swal.fire({
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            icon: 'error',
            title: 'Alerta crítica',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            text: 'Ha sobresalido el Eje X a más de 2.9',
            width: 600,
            padding: '3em',
            backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
          });

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });


          // eje x critica
          // var tabla1 = "vibracion";
          // var descripcion1= "Alerta crítica Eje X";
          // document.getElementById("formsave_at0").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1x1' name='tablax1' value='"+tabla1+"'>"+ "<br><input id='d1x1' type='hidden' name='descripcionx1' value='"+descripcion1+"'><button style='{display:none;}' type='button' id='sendx1'> ola";
          // $('#sendx1').hide();


          // setTimeout(() => {
          //   $('#sendx1').click();

          // }, 3000);                   

          // var datos = $(this).serializeArray();
          // datos.push({name: 'tag', value: 'formulariosave'});
          var tabla11 = "vibracion"
          var descripcion11 = "Alerta crítica Eje X"

          $.ajax({
            url: '{{route("save_at")}}',
            type: 'POST',
            async: false,
            dateType: 'json',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              tabla: tabla11,
              descripcion: descripcion11,
              valor: data.data[0]
            },
            success: function(response) {
              if (response) {
                console.log('ok x');
              }
            },
            error: function(response) {
              console.error();
            }
          });
        } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {

          document.getElementById('xyz').muted = false;
          document.getElementById('xyz').play();
          Swal.fire({
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            icon: 'warning',
            title: '¡Advertencia!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            text: 'Ha sobresalido el Eje X a más de 1.5',
            width: 600,
            padding: '3em',
            backdrop: `
                        rgba(255, 223, 0,0.25)
                        left top
                        no-repeat
                        `
          });

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });

          // eje x advertencia
          var tabla22 = "vibracion"
          var descripcion22 = "Advertencia en Eje X"
          $.ajax({
            url: '{{route("save_at")}}',
            type: 'POST',
            async: false,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla22,
              descripcion: descripcion22,
              valor: data.data[0],
            },
            success: function(response) {
              if (response) {
                console.log('ok x adv');
              }
            },
            error: function(response) {
              console.error();
            }
          });
        }
      },
      error: function(data) {
        console.log(data);
      }
    });
  }
  setData1();
  setInterval(() => {
    setData1();
  }, 3000);
</script>
<!-- Script alerta del eje Z -->
<script type="text/javascript">
  var setData2 = function() {
    $.ajax({
      url: "/api/dataalertz",
      type: 'GET',
      async: false,
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        if (data.data[0] >= 2.9) {

          document.getElementById('xyz').muted = false;
          document.getElementById('xyz').play();
          Swal.fire({
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            icon: 'error',
            title: 'Alerta crítica',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            text: 'Ha sobresalido el Eje Z a más de 2.9',
            width: 600,
            padding: '3em',
            backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
          });

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });

          // eje z critica
          var tabla33 = "vibracion";
          var descripcion33 = "Alerta crítica Eje Z";
          $.ajax({
            url: '{{route("save_at")}}',
            type: 'POST',
            async: false,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla33,
              descripcion: descripcion33,
              valor: data.data[0],
            },
            success: function(response) {
              if (response) {
                console.log('ok z');
              }
            },
            error: function(response) {
              console.error();
            }


          });


        } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {

          document.getElementById('xyz').muted = false;
          document.getElementById('xyz').play();
          Swal.fire({
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            icon: 'warning',
            title: '¡Advertencia!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            text: 'Ha sobresalido el Eje Z a más de 1.5',
            width: 600,
            padding: '3em',
            backdrop: `
                        rgba(255, 223, 0,0.25)
                        left top
                        no-repeat
                        `
          });
          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });

          // eje z advertencia
          var tabla4 = "vibracion";
          var descripcion4 = "Advertencia en Eje Z";

          $.ajax({
            url: '{{route("save_at")}}',
            type: 'POST',
            async: false,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla4,
              descripcion: descripcion4,
              valor: data.data[0],
            },
            success: function(response) {
              if (response) {
                console.log('ok z adv');
              }
            },
            error: function(response) {
              console.error();
            }


          });
        }

      },
      error: function(data) {
        console.log(data);
      }
    });
  }
  setData2();
  setInterval(() => {
    setData2();
  }, 3000);
</script>
<!-- Script alerta del eje Y -->
<script type="text/javascript">
  var setData3 = function() {
    $.ajax({
      url: "/api/dataalerty",
      type: 'GET',
      dataType: 'json',
      async: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        if (data.data[0] >= 2.9) {
          document.getElementById('xyz').muted = false;
          document.getElementById('xyz').play();
          Swal.fire({
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            icon: 'error',
            title: 'Alerta crítica',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            text: 'Ha sobresalido el Eje Y a más de 2.9',
            width: 600,
            padding: '3em',
            backdrop: `
                        rgba(178, 34, 34,0.25)
                        left top
                        no-repeat
                        `
          });
          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });
          // eje y critica
          var tabla5 = "vibracion";
          var descripcion5 = "Alerta crítica Eje Y";
          $.ajax({
            url: '{{route("save_at")}}',
            async: false,
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla5,
              descripcion: descripcion5,
              valor: data.data[0],
            },
            success: function(response) {
              if (response) {
                console.log('ok y');
              }
            },
            error: function(response) {
              console.error();
            }
          });
        } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
          document.getElementById('xyz').muted = false;
          document.getElementById('xyz').play();
          Swal.fire({
            showClass: {
              popup: 'animate__animated animate__fadeIn'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOut'
            },
            icon: 'warning',
            title: '¡Advertencia!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            text: 'Ha sobresalido el Eje Y a más de 1.5',
            width: 600,
            padding: '3em',
            backdrop: `
                        rgba(255, 223, 0,0.25)
                        left top
                        no-repeat
                        `
          });
          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });
          // eje y advertencia
          var tabla6 = "vibracion";
          var descripcion6 = "Advertencia Eje Y";
          $.ajax({
            url: '{{route("save_at")}}',
            async: false,
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla6,
              descripcion: descripcion6,
              valor: data.data[0],
            },
            success: function(response) {
              if (response) {
                console.log('ok y adv');
              }
            },
            error: function(response) {
              console.error();
            }
          });
        }
      },
      error: function(data) {
        console.log(data);
      }
    });
  }
  setData3();
  setInterval(() => {
    setData3();
  }, 3000);
</script>