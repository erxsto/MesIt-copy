<!-- Script advertencia-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- ALERTAS VIBRACION -->
<!-- Script alerta del eje X -->
<script type="text/javascript">
  var setData4 = function() {
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
  setData4();
  setInterval(() => {
    setData4();
  }, 3000);
</script>
<!-- Script alerta del eje Z -->
<script type="text/javascript">
  var setData5 = function() {
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

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });

          // eje z critica
          var tabla3 = "vibracion";
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
              tabla: tabla3,
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

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });

          // eje z advertencia
          var tabla44 = "vibracion";
          var descripcion44 = "Advertencia en Eje Z";

          $.ajax({
            url: '{{route("save_at")}}',
            type: 'POST',
            async: false,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla44,
              descripcion: descripcion44,
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
  setData5();
  setInterval(() => {
    setData5();
  }, 3000);
</script>
<!-- Script alerta del eje Y -->
<script type="text/javascript">
  var setData6 = function() {
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

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });
          // eje y critica
          var tabla55 = "vibracion";
          var descripcion55 = "Alerta crítica Eje Y";
          $.ajax({
            url: '{{route("save_at")}}',
            async: false,
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla55,
              descripcion: descripcion55,
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

          $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");
          $('#notificaciones').on('click', function(e) {
            $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");
          });
          // eje y advertencia
          var tabla66 = "vibracion";
          var descripcion66 = "Advertencia en Eje Y";
          $.ajax({
            url: '{{route("save_at")}}',
            async: false,
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dateType: 'json',
            data: {
              tabla: tabla66,
              descripcion: descripcion66,
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
  setData6();
  setInterval(() => {
    setData6();
  }, 3000);
</script>