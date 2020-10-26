<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Ubicación</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="./js/jquery-3.4.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="./js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./css/materialize.css">
		<script src="./js/materialize.min.js"></script>
		<link rel="stylesheet" href="./css/estilo.css">
		<!--
			Autor: Jorge Luis Pérez Canto-
			Carné: 201024865
			Fecha: 18-07-2020.
		-->
	</head>
	<body>

		<header>
		<?php
			include_once 'header.php';
		?>
		</header>

		<main>
			<div class="google-maps" id="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d825.7837266981156!2d-90.54685370411886!3d14.587745301782437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a13fe1908f9f%3A0x243251899fa10f59!2sEFPEM%20-%20USAC!5e1!3m2!1ses!2sgt!4v1595117433857!5m2!1ses!2sgt" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>     	

		</main>

		<footer>
			<?php
				include_once 'footer.php';
			?>	
		</footer>
	</body>
</html>