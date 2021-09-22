<?php

include_once 'DB/Atajo.php';
include_once 'DB/AtajoDB.php';

$atajoDB = new AtajoDB();
$atajo = new Atajo();

$atajos = $atajoDB->listar();
// session_start();
// if (!(isset($_SESSION['usu']) && $_SESSION['usu'])) {
// 	header('Location: login.php');
// } 


?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Accesos a Registros Clínicos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">


		<!-- Header -->
		<header id="header">
			<div class="inner">

				<!-- Logo -->
				<a href="#" class="logo" title="Refrescar página web">
					<span class="symbol"><img src="images/logo.png" alt="" style="object-fit: cover;" /></span>
					<span class="title">Accesos a Registros Clínicos </span><span class="lugar"> Clínica Alemana Osorno</span>
				</a>
				
			</div>
		</header>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<header>

					<h2>Búsqueda de programas</h2>


					<input class="" id="myInput" type="text" placeholder="Buscar...">
				</header>
				<section id="shortcuts">
					<div class="button small fit" id="btnAll">Todo</div>
					<div class="button small fit">Ficha</div>
					<div class="button small fit">Examenes</div>
					<div class="button small fit">Residencia Médica</div>
				</section>
				<section class="tiles" id="myDIV">
				
					<?php foreach($atajos as $a): ?>
					
					<article class="style6">
						<span class="image">
							
							<img src="images/<?= ($a->rutaImagen != '' ? $a->rutaImagen : 'logo.png') ?>" alt="" />
						</span>
						<a target="_blank" href="<?= $a->rutaAtajo?>">
							<h2><?= $a->nombre?></h2>
							<div class="content">
								<p><?= $a->descripcion ?></p>
							</div>
						</a>
					</article>
					<?php endforeach; ?>

				</section>
			</div>
		</div>

		<!-- Footer -->
		<?php include_once 'footer.php'?>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

<script>
	$(document).ready(function () {
		var hayError = getParameterByName("error");
		if(hayError == 1){
			alert("El programa no está instalado en su ordenador");
		}


		$("#myInput").on("keyup focus", function () {
			var value = $(this).val().toLowerCase();
			
			$("article a").filter(function () {
				$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
			console.log(value);
		});
		
		$("#shortcuts > .button").on("click", function () {
			var value = $(this).text().toLowerCase();
			$("#myInput").val(value);
			$("article a").filter(function () {
				$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		});
		
		$("#btnAll").on("click", function () {			
			$("#myInput").focus();
			$("#myInput").val("");
			var value = "";
			$("article a").filter(function () {
				$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		});
		function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
window.history.pushState("", "", '/Accesos/index.php');

	});


	

</script>


</html>