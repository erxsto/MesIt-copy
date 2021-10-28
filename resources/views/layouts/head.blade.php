<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Título de la página -->
<title>AMATS ELECTRIC - MESit</title>
<!-- Scripts  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/02bd5799bc.js" crossorigin="anonymous"></script>
<!-- ICONS -->
<script src="https://kit.fontawesome.com/e815cd1bb7.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
<!-- Logo de la página -->
<link rel="shortcut icon" href="{{ asset('img/logo-AE.png') }}">
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/utils/Draggable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js" integrity="sha512-NhRZzPdzMOMf005Xmd4JonwPftz4Pe99mRVcFeRDcdCtfjv46zPIi/7ZKScbpHD/V0HB1Eb+ZWigMqw94VUVaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Estilos de cada página dependiendo su clase -->
<style>
  * {
    box-sizing: border-box;
  }
  body {
    font-family: 'Open Sans', sans-serif;
    background: ;
  }
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: 'Raleway', sans-serif;
    margin: 0;
  }
  .contenedor {
    max-width: 1000px;
    width: 90%;
    margin: auto;
  }
  header {
    margin-bottom: 40px;
  }
  header h3 {
    color: #5A5A5A;
  }
  header h1 {
    font-size: 60px;
    font-weight: normal;
  }
  .graficas {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }
  .grafica {
    padding: 20px;
    background: #fff;
    border: solid 1px;
    border-radius: 5px;
    display: grid;
    box-shadow: 5px 5px 50px rgba(0, 0, 0, .20);
  }
  @media screen and (max-width: 850px) {}
  .publicacion .titulo {
    color: #C00000;
    font-size: 32px;
    margin: 0;
  }
  .tooltip {
    font-weight: normal;
    color: #3c48e5;
    text-decoration: none;
    position: relative;
    opacity: 1;
    font-size: 1.200rem;
  }
  .tooltip:hover .tooltip-box {
    display: inline-block;
  }
  .tooltip-box {
    display: none;
    position: absolute;
    background: #000;
    line-height: 13px;
    z-index: 500;
    text-align: center;
    color: #fff;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
    left: 0;
    bottom: 39px;
  }
  .tooltip-box::after {
    content: "";
    display: block;
    border-top: 7px solid #000;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    position: absolute;
    bottom: -6px;
    left: calc(50% - 32px);
  }
  .container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(1, 1fr);
    grid-template-rows: repeat(6, auto);
  }
  .energy {
    display: grid;
    grid.gap: 20px;
    grid-template-columns: 1fr 1fr 1fr ;
    
  }
  .botongrafica{
    display:grid;
    grid-template-columns: 1fr;
  }
  .linkboton{
    height:140%;
    font-weight:bold;
    color:white;
    margin-left:9.37rem;
    width:70%;
    border:solid 0.16em #0d3361;
    border-radius: 80px;
    background: rgb(29,79,140);
    background: linear-gradient(90deg, rgba(29,79,140,0.42) 0%, rgba(58,109,171,0.7959558823529411) 52%, rgba(29,79,140,0.42) 100%);
    box-shadow: 1px 2px 8px 1px rgba(11,99,138,0.95);
-webkit-box-shadow: 1px 2px 8px 1px rgba(11,99,138,0.95);
-moz-box-shadow: 1px 2px 8px 1px rgba(11,99,138,0.95);
    text-align:center;
    padding-top:0.62rem;
    font-size:1rem;
  }
  a { text-decoration:none; color:white; } 
  .container>div,
  .container .header {
    background: black;
  }
  body.dark {
    background-color: #4c4c4c;
  }
  body.dark .copyright {
    color: #fff;
  }
  body.dark .navbar {
    background-color: #fff;
  }
  .checkbox {
    opacity: 0;
    position: absolute;
  }
  .label {
    background-color: #111;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 50px;
    position: relative;
    padding: 5px;
    height: 26px;
    width: 50px;
    left: 2px;
    top: 12px;
    transform: scale(0.8);
  }
  .ball {
    background-color: #fff;
    border-radius: 50%;
    position: absolute;
    top: 2px;
    left: 2px;
    height: 22px;
    width: 22px;
    transition: transform 0.2s linear;
  }
  .checkbox:checked+.label .ball {
    transform: translateX(24px);
  }
  .fa-moon {
    color: #f1c40f;
  }
  .fa-sun {
    color: #f39c12;
  }
  /* CUSTOM NAVBAR */
  .navbar-custom {
    color: #4c4c4c;
  }
  /* ETIQUETAS ENERGIA */
  @import url("https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap");
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .num {
    box-shadow: 0px 18px 9px -2px rgba(179, 206, 230, 0.78);
    -webkit-box-shadow: 0px 18px 9px -2px rgba(179, 206, 230, 0.78);
    -moz-box-shadow: 0px 18px 9px -2px rgba(179, 206, 230, 0.78);
    width: 45%;
    font-size: 1rem;
    border: solid 1px;
    border-radius: 90px;
    display: inline-block;
    font-weight: bold;
  }
  /* ETIQUETA <a> */
  .a {
    position: relative;
    display: inline-block;
    padding: 1.5rem;
    margin: 1.5rem 0;
    text-decoration: none;
    text-transform: uppercase;
    transition: 0.5s;
    letter-spacing: 0.25rem;
    overflow: hidden;
    margin-right: 1.2rem;
    font-size: 1rem;
    text-align: center;
    background: ;
    color: black;
    margin-left: 1.5rem;
    box-shadow: -1px 1px 5px 3px rgba(0, 89, 153, 0.59);
    -webkit-box-shadow: -1px 1px 5px 3px rgba(0, 89, 153, 0.59);
    -moz-box-shadow: -1px 1px 5px 3px rgba(0, 89, 153, 0.59);
    /* -webkit-box-reflect: below 0.0625em linear-gradient(transparent, #0005); */
  }
  /* 
.a {
  filter: hue-rotate(270deg); //FILTER CAMBIO DE COLOR
} */
  /* SPANS */
  .a span {
    position: absolute;
    display: block;
  }
  .a span:nth-child(1) {
    top: 0;
    left: 0;
    width: 100%;
    height: 0.125em;
    background: linear-gradient(90deg, transparent, #1261C7);
    animation: animate1 1s linear infinite;
  }
  @keyframes animate1 {
    0% {
      left: -100%;
    }
    50%,
    100% {
      left: 100%;
    }
  }
  .a span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 0.125em;
    height: 100%;
    background: linear-gradient(180deg, transparent, #1261C7);
    animation: animate2 1s linear infinite;
    animation-delay: 0.25s;
  }
  @keyframes animate2 {
    0% {
      top: -100%;
    }
    50%,
    100% {
      top: 100%;
    }
  }
  .a span:nth-child(3) {
    bottom: 0;
    right: 0;
    width: 100%;
    height: 0.125em;
    background: linear-gradient(270deg, transparent, #1261C7);
    animation: animate3 1s linear infinite;
    animation-delay: 0.5s;
  }
  @keyframes animate3 {
    0% {
      right: -100%;
    }
    50%,
    100% {
      right: 100%;
    }
  }
  .a span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 0.125em;
    height: 100%;
    background: linear-gradient(360deg, transparent, #1261C7);
    animation: animate4 1s linear infinite;
    animation-delay: 0.75s;
  }
  @keyframes animate4 {
    0% {
      bottom: -100%;
    }
    50%,
    100% {
      bottom: 100%;
    }
  }
  /* END ENERGY */
  .izqlog {
    margin-left: 250px;
  }
  .izqitem {
    margin-left: 300px;
  }
  .chart_div {
    width: 700px;
    height: 500px;
  }
  .gfases{
    display: grid;
  grid-template-columns: 50% 50%;
  grid-template-rows: 50% 50%;
  }
  /* MEDIA SCREEN */
  @media (max-width:1267px) {
    .izqlog {
      margin-left: 120px;
    }
    .izqitem {
      margin-left: 50px;
    }
    .graficas {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    /* TEMPERATURA */
    .chart_div {
      width: 450px;
      height: 450px;
    }
    .chart_div1 {
      display: grid;
      align-items: center;
      grid-template-columns: 1fr 1fr;
    }
  }
  @media (max-width:1025px) {
    .izqlog {
      margin-left: 120px;
    }
    .izqitem {
      margin-left: 220px;
    }
    .topitem {
      margin-top: 20px;
    }
    /* TEMPERATURA */
    .chart_div {
      width: 350px;
      height: 350px;
    }
    .chart_div1 {
      display: grid;
      align-items: center;
      grid-template-columns: 1fr 1fr;
    }
    
  }
  @media screen and (max-width:900px) {
    body {
      font-size: 14px;
    }
    .navbar .navbar-brand {
      font-size: 14px;
    }
    .izqlog {
      margin-left: 80px;
    }
    .izqitem {
      margin-left: 40px;
    }
    /* Dash y temp graficas */
    .graficas {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
    }
    .nav-link {
      font-size: 14px;
    }
    /* Energia */
    .a {
      font-size: 10px;
    }
    .num {
      font-size: 10px;
    }
    /* Temperatura */
    .chart_div1 {
      display: grid;
      align-items: center;
      grid-template-columns: 1fr 1fr;
    }
  }
  @media screen and (max-width:760px) {
    body {
      font-size: 9px;
    }
    .nav-link {
      font-size: 20px;
    }
    .grafica {
      font-size: 10px;
    }
    .navbar .navbar-brand {
      font-size: 15px;
    }
    /* Energia */
    .energy {
      display: grid;
    	grid-template-columns: 1fr;
      
    }
    .a {
      font-size: 17px;
    }
    .num {
      font-size: 16px;
    }
    /* temp */
    .chart_div {
      width: 420px;
      height: 250px;
    }
    .chart_div1 {
      margin-right: 120px;
      display: grid;
      align-items: center;
      grid-template-columns: 1fr;
    }
    .linkboton{
      margin-left:80px;
    }
    }    
    
  
  @media screen and (max-width:480px) {
    .nav-link {
      margin-left: 130px;
      font-size: 25px;
    }
    .izqitem {
      margin-left: 12px;
    }
    .mesit {
      margin-left: 50px;
    }
    /* dash */
    .grafica {
      font-size: 6px;
    }
    /* Energía */
    .energy {
      display: grid;
      grid-template-columns: 1fr;
    }
    /* TEMPERATURA */
    .chart_div {
      width: 250px;
      height: 250px;
    }
    .chart_div1 {
      display: grid;
      align-items: center;
      grid-template-columns: 1fr;
    }
    .linkboton{
    margin-left: 60px;
    
    }
    a{
      font-size:13px;
    }
    
  }
  .boton {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 17%;
	height: 48px;
	background: #141414;
	color: #fff;
	font-family: 'Roboto', sans-serif;
	font-size: 20px;
	font-weight: 500;
	border: none;
	cursor: pointer;
	transition: .3s ease all;
	border-radius: 5px;
	position: relative;
	overflow: hidden;
}
.boton span {
	position: relative;
	z-index: 2;
	transition: .3s ease all;
}
.boton.uno::after {
	content: "";
	width: 100%;
	height: 100%;
	background: #07375e;
	position: absolute;
	z-index: 1;
	top: -80px;
	left: 0;
	transition: .3s ease-in-out all;
}
.boton.uno:hover::after {
	top: 0;
}
.grafica.seleccionado{
  transform: scale(1.02) rotate(-1deg);
  box-shadow: 5px 5px 50px rgba(0, 0, 0, .20);
  background: #ccc;
}
.grafica.fantasma{
  border: 2px dotted #000;
}
.grafica.drag{
  opacity: 0;
}
.fas{
  cursor: move;
}
.sh{
  box-shadow: -1px 1px 5px 7px rgba(0,0,0,0.51);
-webkit-box-shadow: -1px 1px 5px 7px rgba(0,0,0,0.51);
-moz-box-shadow: -1px 1px 5px 7px rgba(0,0,0,0.51);
}
.boton.seis {
	background: none;
	color: #000;
}
.boton.seis svg {
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	fill: none;
}
.boton.seis rect {
	width: 100%;
	height: 100%;
	stroke: #000;
	stroke-width: 8px;
	stroke-dasharray: 1000;
	stroke-dashoffset: 1000;
	transition: .9s ease all;
}
.boton.seis:hover rect {
	stroke-dashoffset: 0;
}
</style> 