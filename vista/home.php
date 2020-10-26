<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Inicio</title>
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
			<?php
				include_once 'inicio.php';
			?>
		</main>

		<footer>
			<?php
				include_once 'footer.php';
			?>	
		</footer>

		<script type="text/javascript">
			$(document).ready(function(){
			  $('.slider').slider({full_width: true});
			});
		</script> 
	</body>
</html>