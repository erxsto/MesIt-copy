<!-- Footer de la página "Lo que va hasta abajo:)" -->
<div class="container text-center text-md-left">
    <div class="row text-center text-md-left" style="background-color: rgba(0, 0, 0, 0.0);">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-info">AMATS ELECTRIC S.A DE C.V</h5>
            <p>Empresa 100% mexicana, distribuye, vende, da soporte técnico, asesora, y capacita a la industria de la automatización.</p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-info">INFORMACIÓN</h5>
            <p>
                <a href="#" class="text-white" style="text-decoration: none;"> Descarga el manual</a>
            </p>
            <p>
                <a href="#" class="text-white" style="text-decoration: none;"> Developers</a>
            </p>
        </div>
        <!-- Lo comentado puede usarse más adelante para agregar más apartados al footer-->
        <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
				<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
			    <p>
				<a href="#" class="text-white" style="text-decoration: none;"> Your Account</a>
			    </p>
			    <p>
				<a href="#" class="text-white" style="text-decoration: none;"> Become an Affiliates</a>
			    </p>
			    <p>
				<a href="#" class="text-white" style="text-decoration: none;">Shipping Rates</a>
			    </p>
			    <p>
				<a href="#" class="text-white" style="text-decoration: none;"> Help</a>
			    </p>
			</div> -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-info">Contacto</h5>
            <p>
                <i class="fas fa-home mr-3"></i> C. Miguel Alemán 1100, Buenavista, 52105 San Mateo Atenco, Méx.
            </p>
            <p>
                <i class="fas fa-envelope mr-3"></i> atencionaclientes@amats.com.mx
            </p>
            <p>
                <i class="fas fa-phone mr-3"></i> 722 541 4584
            </p>
            <p>
                <i class="fas fa-phone mr-3"></i> 722 508 0234
            </p>
        </div>

    </div>
    <hr style="color: cyan;" class="mb-1">
    <div class="row align-items-center" style="background-color: rgba(0, 0, 0, 0.0);">
        <div id="copyright" class="col-md-7 col-lg-8">
            <p> Copyright ©2021 Todos los derechos reservados por:
                <a href="https://www.amats.com.mx/" style="text-decoration: none;">
                    <strong class="text-info">AMATS ELECTRIC S.A DE C.V</strong>
                </a>
            </p>
        </div>
        <div class="col-md-5 col-lg-4">
            <div class="text-center text-md-right">

                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/amatselectric" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.twitter.com/amatselectric" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://mx.linkedin.com/company/amatselectric" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/channel/UCAgEBjo3r2FdedNkefuDGhA" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Botón de whatsapp -->
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "7225414584", // WhatsApp number
            call_to_action: "Envíanos un mensaje", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
            host = "getbutton.io",
            url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>


<!-- Botón el cual cambia la página de blanco y negro "en desarrollo" -->
<!-- <script>
    const toggleSwitch = document.querySelector('input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);

        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
            document.body.classList.toggle('dark');
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            document.body.classList.toggle('dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
            document.body.classList.toggle('dark');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
</script> -->