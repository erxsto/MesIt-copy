<!-- Script advertencia-->

<form id="formsave_at0"method="post" action="{{route('save_at')}}">

</form>
<form id="formsave_at1"method="post" action="{{route('save_at')}}">

</form>
<form id="formsave_at2"method="post" action="{{route('save_at')}}">

</form>

<!-- ALERTAS VIBRACION -->
<!-- Script alerta del eje X -->
<script type="text/javascript">
    var setData1 = function() {
        $.ajax({
            url: "/api/dataalertx",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.data[0] >= 2.9) {
                    
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");   
                    $('#notificaciones').on('click',function(e){
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");});    
                    
                    
                    // eje x critica
                        var tabla1 = "vibracion";
                        var descripcion1= "Alerta crítica Eje X";
                        document.getElementById("formsave_at0").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1x1' name='tablax1' value='"+tabla1+"'>"+ "<br><input id='d1x1' type='hidden' name='descripcionx1' value='"+descripcion1+"'><button style='{display:none;}' type='button' id='sendx1'> ola";
                        $('#sendx1').hide();
                        setTimeout(() => {
                          $('#sendx1').click();
                        
                        }, 3000);                   
                       
                        
                        $('#sendx1').on('click',function(e){
                                            
                                    // var datos = $(this).serializeArray();
                                    // datos.push({name: 'tag', value: 'formulariosave'});
                                        var tabla11 = $('#t1x1').val();
                                        var descripcion11= $('#d1x1').val();
                                        var _token = $("input[name=_token]").val();
                                        ruta = $('#formsave_at0').attr('action');
                
                                    $.ajax({
                                      url: ruta,
                                      type: 'POST',
                                      dateType: 'json',
                                      data: {
                                        tabla: tabla11,
                                        descripcion: descripcion11,
                                        valor : data.data[0],
                                        _token: _token
                                      },
                                      success:function(response){
                                        if(response){
                                          console.log('ok x');
                                        }
                                      },error:function(response){console.error();}
                                            
                                            
                                });
                                
                            
                                });

                } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
 
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");   
                    $('#notificaciones').on('click',function(e){
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");});    
                    
                    // eje x advertencia
                    var tabla2 = "vibracion";
                        var descripcion2= "Advertencia en Eje X";
                        document.getElementById("formsave_at0").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1x2' name='tabla' value='"+tabla2+"'>"+ "<br><input id='d1x2' type='hidden' name='descripcionx2' value='"+descripcion2+"'><button style='{display:none;}' type='button' id='sendx2'> ola";
                        $('#sendx2').hide();
                        setTimeout(() => {
                          $('#sendx2').click();
                        
                        }, 3000);                   
                       
                        
                        $('#sendx2').on('click',function(e){
                                            
                                    // var datos = $(this).serializeArray();
                                    // datos.push({name: 'tag', value: 'formulariosave'});
                                        var tabla22 = $('#t1x2').val();
                                        var descripcion22= $('#d1x2').val();
                                        var _token = $("input[name=_token]").val();
                                        ruta = $('#formsave_at0').attr('action');
                
                                    $.ajax({
                                      url: ruta,
                                      type: 'POST',
                                      dateType: 'json',
                                      data: {
                                        tabla: tabla22,
                                        descripcion: descripcion22,
                                        valor : data.data[0],
                                        _token: _token
                                      },
                                      success:function(response){
                                        if(response){
                                          console.log('ok x adv');
                                        }
                                      },error:function(response){console.error();}
                                            
                                            
                                });
                                
                            
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
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.data[0] >= 2.9) {
                     
                  $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>"); 
                    $('#notificaciones').on('click',function(e){
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");});    
                    
                     // eje z critica
                     var tabla3 = "vibracion";
                        var descripcion3= "Alerta crítica Eje Z";
                        document.getElementById("formsave_at1").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1z1' name='tabla' value='"+tabla3+"'>"+ "<br><input id='d1z1' type='hidden' name='descripcionz1' value='"+descripcion3+"'><button style='{display:none;}' type='button' id='sendz1'> ola";
                        $('#sendz1').hide();
                        setTimeout(() => {
                          $('#sendz1').click();
                        
                        }, 3000);                   
                       
                        
                        $('#sendz1').on('click',function(e){
                                            
                                    // var datos = $(this).serializeArray();
                                    // datos.push({name: 'tag', value: 'formulariosave'});
                                        var tabla33 = $('#t1z1').val();
                                        var descripcion33= $('#d1z1').val();
                                        var _token = $("input[name=_token]").val();
                                        ruta = $('#formsave_at1').attr('action');
                
                                    $.ajax({
                                      url: ruta,
                                      type: 'POST',
                                      dateType: 'json',
                                      data: {
                                        tabla: tabla33,
                                        descripcion: descripcion33,
                                        valor : data.data[0],
                                        valor : data.data[0],
                                        valor : data.data[0],
                                        valor : data.data[0],
                                        _token: _token
                                      },
                                      success:function(response){
                                        if(response){
                                          console.log('ok z');
                                        }
                                      },error:function(response){console.error();}
                                            
                                            
                                });
                                
                            
                                });
                    
                } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
                    
                  $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");
                    $('#notificaciones').on('click',function(e){
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");});    
                    
                    // eje z advertencia
                    var tabla4 = "vibracion";
                        var descripcion4= "Advertencia en Eje Z";
                        document.getElementById("formsave_at1").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1z2' name='tabla' value='"+tabla4+"'>"+ "<br><input id='d1z2' type='hidden' name='descripcion' value='"+descripcion4+"'><button style='{display:none;}' type='button' id='sendz2'> ola";
                        $('#send').hide();
                        setTimeout(() => {
                          $('#send').click();
                        
                        }, 3000);                   
                       
                        
                        $('#send').on('click',function(e){
                                            
                                    // var datos = $(this).serializeArray();
                                    // datos.push({name: 'tag', value: 'formulariosave'});
                                        var tabla44 = $('#t1z2').val();
                                        var descripcion44= $('#d1z2').val();
                                        var _token = $("input[name=_token]").val();
                                        ruta = $('#formsave_at1').attr('action');
                
                                    $.ajax({
                                      url: ruta,
                                      type: 'POST',
                                      dateType: 'json',
                                      data: {
                                        tabla: tabla44,
                                        descripcion: descripcion44,
                                        valor : data.data[0],
                                        valor : data.data[0],
                                        valor : data.data[0],
                                        _token: _token
                                      },
                                      success:function(response){
                                        if(response){
                                          console.log('ok z adv');
                                        }
                                      },error:function(response){console.error();}
                                            
                                            
                                });
                                
                            
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.data[0] >= 2.9) {
                     
                  $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:red;'class='fa fa-circle'></i>");    
                    $('#notificaciones').on('click',function(e){
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");});    
                    
                    // eje y critica
                        var tabla5 = "vibracion";
                        var descripcion5= "Alerta crítica Eje Y";
                        document.getElementById("formsave_at2").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1y1' name='tabla' value='"+tabla5+"'>"+ "<br><input id='d1y1' type='hidden' name='descripciony1' value='"+descripcion5+"'><button style='{display:none;}' type='button' id='sendy1'> ola";
                        $('#sendy1').hide();
                        setTimeout(() => {
                          $('#sendy1').click();
                        
                        }, 3000);                   
                       
                        
                        $('#sendy1').on('click',function(e){
                                            
                                    // var datos = $(this).serializeArray();
                                    // datos.push({name: 'tag', value: 'formulariosave'});
                                        var tabla55 = $('#t1y1').val();
                                        var descripcion55= $('#d1y1').val();
                                        var _token = $("input[name=_token]").val();
                                        ruta = $('#formsave_at2').attr('action');
                
                                    $.ajax({
                                      url: ruta,
                                      type: 'POST',
                                      dateType: 'json',
                                      data: {
                                        tabla: tabla55,
                                        descripcion: descripcion55,
                                        valor : data.data[0],
                                        valor : data.data[0],
                                        _token: _token
                                      },
                                      success:function(response){
                                        if(response){
                                          console.log('ok y');
                                        }
                                      },error:function(response){console.error();}
                                            
                                            
                                });
                                
                            
                                });
                } else if (data.data[0] >= 1.5 && data.data[0] < 2.9) {
                     
                  $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:orange;'class='fa fa-circle'></i>");    
                    $('#notificaciones').on('click',function(e){
                    $('#spancamp').html("&nbsp&nbsp<i style='font-size:10px; margin-right:10px; color:gray;'class='fa fa-circle'></i>");});    
                  
                    // eje y advertencia
                        var tabla6 = "vibracion";
                        var descripcion6= "Advertencia Eje Y";
                        document.getElementById("formsave_at2").innerHTML = "<input type='hidden' name='_token' value='{{csrf_token()}}'><input type='hidden' id='t1y2' name='tabla' value='"+tabla6+"'>"+ "<br><input id='d1y2' type='hidden' name='descripciony2' value='"+descripcion6+"'><button style='{display:none;}' type='button' id='sendy2'> ola";
                        $('#sendy2').hide();
                        setTimeout(() => {
                          $('#sendy2').click();
                        
                        }, 3000);                   
                       
                        
                        $('#sendy2').on('click',function(e){
                                            
                                    // var datos = $(this).serializeArray();
                                    // datos.push({name: 'tag', value: 'formulariosave'});
                                        var tabla66 = $('#t1y2').val();
                                        var descripcion66= $('#d1y2').val();
                                        var _token = $("input[name=_token]").val();
                                        ruta = $('#formsave_at2').attr('action');
                
                                    $.ajax({
                                      url: ruta,
                                      type: 'POST',
                                      dateType: 'json',
                                      data: {
                                        tabla: tabla66,
                                        descripcion: descripcion66,
                                        valor : data.data[0],
                                        _token: _token
                                      },
                                      success:function(response){
                                        if(response){
                                          console.log('ok y adv');
                                        }
                                      },error:function(response){console.error();}
                                            
                                            
                                });
                                
                            
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
