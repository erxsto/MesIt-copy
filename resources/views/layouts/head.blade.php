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
  
.fas{
  display: flex;
  /* default */
	flex-direction: row-reverse;
  /* default */
	flex-wrap: wrap;
  /* default */
	justify-content: flex-start;
	align-items: center;
	align-content: flex-end;
}
.hoverit:hover{
  font-size:1.5em;  
}
.home{
  font-size:1.1em;
}

*{
  box-sizing: border-box;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
  /* background: rgb(8,34,77);
  background: linear-gradient(90deg, rgba(8,34,77,1) 0%, rgba(28,54,101,1) 0%, rgba(90,121,173,1) 0%, rgba(165,206,231,1) 100%, rgba(0,187,255,1) 100%); */
  /* background: rgb(11,11,11);
  background: radial-gradient(circle, rgba(11,11,11,1) 0%, rgba(32,32,32,1) 42%, rgba(27,27,27,1) 66%, rgba(12,12,14,1) 100%); */ 
  /* font-family: "Raleway", sans-serif;
  font-weight: bold;
  font-size: 14px; */
  margin:20px;
  transition: background 0.2s linear;
}

body.dark{
  background-color: #111a35;
}

body.dark .copyright{
  color: #fff;
}

.checkbox{
  opacity: 0;
  position: absolue;
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
  transform: scale(1.5);
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

.menu{
  border-top: 1px solid #000;
  border-bottom: 1px solid #000;
  border-right: 1px solid #000;
  border-left: 1px solid #000;
  display: flex;
  justify-content: space-between;
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
  color: #03e9f4;
  text-decoration: none;
  text-transform: uppercase;
  transition: 0.5s;
  letter-spacing: 0.25em;
  overflow: hidden;
  margin-right: 11.25em;
}
.a:hover {
  background: #03e9f4;
  color: #050801;
  box-shadow: 0 0 0.3125em #03e9f4, 0 0 1.5625em #03e9f4, 0 0 3.125em #03e9f4,
    0 0 12.5em #03e9f4;
  -webkit-box-reflect: below 0.0625em linear-gradient(transparent, #0005);
}
.a:nth-child(1) {
  filter: hue-rotate(270deg);
}
.a:nth-child(2) {
  filter: hue-rotate(110deg);
}

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
  background: linear-gradient(90deg, transparent, #03e9f4);
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
  background: linear-gradient(180deg, transparent, #03e9f4);
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
  background: linear-gradient(270deg, transparent, #03e9f4);
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
  background: linear-gradient(360deg, transparent, #e9f403);
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

@media screen and (max-width:500px){
  .body{
    font-size: 10px;
  }
  .a{
    font-size: 7px;
  }
  
}
</style>