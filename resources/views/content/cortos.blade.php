<script type="text/javascript">
    setInterval(function() {
        var JSON = $.ajax({
            url: "/api/datacorto",
            dataType: 'json',
            method: 'GET',
            async: false
        }).responseText;
        var Respuesta1 = jQuery.parseJSON(JSON);
        if (Respuesta1[0].puerto1 == 1) {

            Swal.fire({
                title: '¡Hubo un corto!',
                text: 'Verifica que todo esté correcto.',
                imageUrl: '/img/puerto1.PNG',
                imageWidth: 150,
                imageHeight: 450,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            });

        } else if (Respuesta1[0].puerto2 == 1) {

            Swal.fire({
                title: '¡Hubo un corto!',
                text: 'Verifica que todo esté correcto.',
                imageUrl: '/img/puerto2.PNG',
                imageWidth: 150,
                imageHeight: 450,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            });
        } else if (Respuesta1[0].puerto3 == 1) {

            Swal.fire({
                title: '¡Hubo un corto!',
                text: 'Verifica que todo esté correcto.',
                imageUrl: '/img/puerto3.PNG',
                imageWidth: 150,
                imageHeight: 450,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            });
        } else if (Respuesta1[0].puerto4 == 1) {

            Swal.fire({
                title: '¡Hubo un corto!',
                text: 'Verifica que todo esté correcto.',
                imageUrl: '/img/puerto4.PNG',
                imageWidth: 150,
                imageHeight: 450,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            });
        }

    }, 5000);
</script>