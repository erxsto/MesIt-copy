<script type="text/javascript">
    setInterval(function() {
        var JSON = $.ajax({
            url: "/api/datacorto",
            dataType: 'json',
            method: 'GET',
            async: false
        }).responseText;
        var Respuesta1 = jQuery.parseJSON(JSON);
        if (Respuesta1[0].master1 == 1) {
            if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto2 == 1 && Respuesta1[0].puerto3 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1,2,3 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto1-2-3-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });

            } else if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto2 == 1 && Respuesta1[0].puerto3 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1,2 y 3 sufrieron un corto.',
                    imageUrl: '/img/puerto1-2-3.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto2 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1,2 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto1-2-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto2 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1 y 2 sufrieron un corto.',
                    imageUrl: '/img/puerto1-2.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto3 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1,3 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto1-3-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto3 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1 y 3 sufrieron un corto.',
                    imageUrl: '/img/puerto1-3.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto1 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto1-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto1 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 1 sufrió un corto.',
                    imageUrl: '/img/puerto1.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto2 == 1 && Respuesta1[0].puerto3 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 2,3 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto2-3-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto2 == 1 && Respuesta1[0].puerto3 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 2 y 3 sufrieron un corto.',
                    imageUrl: '/img/puerto2-3.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto2 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 2 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto2-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto2 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 2 sufrió un corto.',
                    imageUrl: '/img/puerto2.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto3 == 1 && Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 3 y 4 sufrieron un corto.',
                    imageUrl: '/img/puerto3-4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto3 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 3 sufrió un corto.',
                    imageUrl: '/img/puerto3.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            } else if (Respuesta1[0].puerto4 == 1) {

                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    },
                    title: '¡Hubo un corto!',
                    text: 'El puerto 4 sufrió un corto.',
                    imageUrl: '/img/puerto4.PNG',
                    imageWidth: 150,
                    imageHeight: 450,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });
            }
        }
    }, 5000);
</script>