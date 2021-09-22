<?php
session_start();
include_once 'DB/Atajo.php';
include_once 'DB/AtajoDB.php';

$atajoDB = new AtajoDB();
$atajo = new Atajo();

$atajos = $atajoDB->listar();
// session_start();
// if (!(isset($_SESSION['usu']) && $_SESSION['usu'])) {
// 	header('Location: login.php');
// } 

$mostrarMensaje = 0;
if (!(isset($_SESSION['exito']) && $_SESSION['exito'])) {
} else {
	unset($_SESSION["exito"]);
	$mostrarMensaje = 1;
}

?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Solicitud de Registros Clínicos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<script src="jquery.rut.js"></script>
</head>

<body class="is-preload">
	<form action="ActMail.php" method="post">
		<!-- Wrapper -->
		<div id="wrapper">


			<!-- Header -->
			<header id="header">
				<div class="inner">

					<!-- Logo -->
					<a href="#" class="logo" title="Refrescar página web">
						<span class="symbol"><img src="images/logo.png" alt="" style="object-fit: cover;" /></span>
						<span class="title">Solicitud de Registros Clínicos </span><span class="lugar"> Clínica Alemana Osorno</span>
					</a>

				</div>
			</header>

			<!-- Main -->
			<div id="main">
				<div class="inner">
					<div id="emailEnviado" class="exito">
						Su solicitud fue enviada correctamente.
					</div>
					<header>

						<h2>Formulario Solicitud ficha de Paciente</h2>

					</header>
					<label for="txtNombre">Solicitado por</label>
					<input class="" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre completo" required>

					<label for="txtMail">Información de contacto</label>
					<input class="" id="txtMail" name="txtMail" type="email" placeholder="Correo Electrónico" required>
					<input class="" id="txtFono" name="txtFono" type="number" placeholder="N° Telefónico" required>

					<label for="txtNombrePaciente">Información de la ficha <span class="alerta" id="rutP"></span></label>
					<input class="" id="txtRutPaciente" name="txtRutPaciente" type="text" placeholder="RUT Paciente" required>
					<input class="" id="txtNombrePaciente" name="txtNombrePaciente" type="text" placeholder="Nombre completo del paciente" required>

					<label for="chkTipoFicha">Seleccionar Tipo de Ficha <span class="alerta" id="ficha"></span></label>
					<input type="checkbox" name="cbxTipoFicha[]" id="cbox1" value="Ambulatorio"> <label for="cbox1">Ambulatorio</label>
					<input type="checkbox" name="cbxTipoFicha[]" id="cbox2" value="Hospitalización"> <label for="cbox2">Hospitalización</label>

					<br>
					<button type="submit" class="button small fit">Enviar Solicitud</button>
					<a href="index.php" class="button small fit">Volver a los accesos</a>
				


				</div>
			</div>

			<!-- Footer -->
			<?php include_once 'footer.php' ?>
	</form>
	</div>
	<script>
		$("input#txtRutPaciente").rut({
			formatOn: 'keyup',
			minimumLength: 8, 
			validateOn: 'change', 
			useThousandsSeparator: false
		});
		var rutCorrecto = false;
		$("input#txtRutPaciente").rut().on('rutInvalido', function(e) {
			$('.alerta#rutP').hide().html("* El rut ingresado no es válido").fadeIn('slow');
			$('#txtRutPaciente').css("border-bottom","solid 2px #ff0000");
			rutCorrecto = false;
		});
		$("input#txtRutPaciente").rut().on('rutValido', function(e) {
			$('.alerta#rutP').html("<span style='color:green'> Rut Correcto </span>").fadeOut(5000);
			$('#txtRutPaciente').css("border-bottom","solid 1px #c9c9c9");
			rutCorrecto = true;
		});

		$(document).ready(function() {
			$("form").submit(function() {
				if ($('input:checkbox').filter(':checked').length < 1) {
					$('.alerta#ficha').hide().html("* Debe seleccionar al menos un tipo de ficha").fadeIn('slow');
					return false;
				}
				return rutCorrecto;
			});




			$("#emailEnviado").prop("hidden", true);
			var mostrarMensaje = <?= $mostrarMensaje ?>;
			if (mostrarMensaje != 0) {
				$("#emailEnviado").prop("hidden", false);
				$("#emailEnviado").fadeOut(7000, function() {});
			}
		});
	</script>
	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>


</body>

</html>