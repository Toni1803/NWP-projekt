<!DOCTYPE html>
<html>
<style>
.container{width:100%; height:100vh; background-image:url("slike-galerija/1aee5c344846f449350feae457ea350e.jpg"); background-repeat:no-repeat; background-size:cover; display:flex; align-items:center; justify-content:center;}
.swiper{width:60%; height:fit-content;}
.swiper-slide img{width:100%;}
.swiper .swiper-button-prev, .swiper .swiper-button-next{color: #fff;}
.swiper .swiper-pagination-bullet-active{background: #fff;}
h1{text-align: center;}
</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Slideshow galerije</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>
<body>
<h1>Galerija slika</h1>
<div class="container">
<!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="slike-galerija/poliklinika.jpg"></div>
    <div class="swiper-slide"><img src="slike-galerija/adolescenti-u-sportu.jpg"></div>
    <div class="swiper-slide"><img src="slike-galerija/kihanje-u-prirodi-e1591091806992.jpg"></div>
	<div class="swiper-slide"><img src="slike-galerija/laboratorij-310x165.jpg"></div>
	<div class="swiper-slide"><img src="slike-galerija/magnetna-rezonanca.jpg"></div>
	<div class="swiper-slide"><img src="slike-galerija/pedijatrijska-kardiologija.jpg"></div>
	<div class="swiper-slide"><img src="slike-galerija/racunalna-tomografija.jpg"></div>
	<div class="swiper-slide"><img src="slike-galerija/Tjedan-mozga-310x165.jpg"></div>
 
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.swiper', {

  loop: true,


  pagination: {
    el: '.swiper-pagination',
	clickable: true,
  },


  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
</script>
</body>
</html>
