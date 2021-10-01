<meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MesIt</title>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/02bd5799bc.js" crossorigin="anonymous"></script>  
      <!-- ICONS -->
      <script src="https://kit.fontawesome.com/e815cd1bb7.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
<style>


*{
  box-sizing: border-box;
}

body {
  background:;
}
.container{
  width:90%;
  max-width:1200px;
  margin: 20px auto;
  display: grid;
   grid-gap: 20px;
   grid-template-columns: repeat(1,1fr);
   grid-template-rows: repeat(6,auto) ;

}

.container > div,
.container .header{
  background:black;
}

body.dark{
  background-color: #232946;
}

body.dark .copyright{
  color: #fff;
}

body.dark .navbar{
  background-color: #fff;
}

.checkbox{
  opacity: 0;
  position: absolute;
}

.label{
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

.ball{
  background-color: #fff;
  border-radius: 50%;
  position: absolute;
  top: 2px;
  left: 2px;
  height: 22px;
  width: 22px;
  transition: transform 0.2s linear;
}
.checkbox:checked + .label .ball{
  transform: translateX(24px);
}
.fa-moon{
  color: #f1c40f;
}
.fa-sun{
  color: #f39c12;
}

/* CUSTOM NAVBAR */
.navbar-custom {
  color:#084B8A;
  
}

/* ETIQUETAS ENERGIA */
@import url("https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* ETIQUETA <a> */
.a {
  position: relative;
  display: inline-block;
  padding: 2.5rem 3.125em;
  margin: 2.5em 0;
  color: #e7c85b;
  text-decoration: none;
  text-transform: uppercase;
  transition: 0.5s;
  letter-spacing: 0.25em;
  overflow: hidden;
  margin-right: 11.25em;
  
  
  background:;
  color: #fd1d1d;
  box-shadow:  -6px 4px 56px -5px rgba(0,93,161,1);
-webkit-box-shadow: -6px 4px 56px -5px rgba(0,93,161,1);
-moz-box-shadow: -6px 4px 56px -5px rgba(0,93,161,1);

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
  background: linear-gradient(90deg, transparent, #ff0000);
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
  background: linear-gradient(180deg, transparent, #ff0000);
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
  background: linear-gradient(270deg, transparent, #ff0000);
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
  background: linear-gradient(360deg, transparent, #ff0000);
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

/* MEDIA SCREEN */

@media screen and (max-width:900px){
  body{
    font-size: 14px;
  }
  .navbar .navbar-brand{
    font-size: 14px;
  }
  .nav-link{
    font-size: 14px;
  }
  
}
@media screen and (max-width:760px){
  body{
    font-size: 9px;
  }
  .navbar .navbar-brand{
    font-size: 9px;
  }
  .nav-link{
    font-size: 9px;
  }
 /* Falta tamaño de cada item */
  
}
</style>