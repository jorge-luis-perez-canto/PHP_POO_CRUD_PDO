<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Información Estudiantes</title>
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
			<h5 class="center">Información para estudiantes</h5>
			<div class="container" id="divEstudiantes2">
				<div class="row">
					<div class="col-md-6 col-xs-12" id="mision">
						<div>
							<h3>Inicio de Clases, 2S 2020</h3>
						</div>
						<div>
							<p>June 30, 2020</p>
						</div>
						<div class="cuadroEstudiantes">
							<img class="imgNoticia" src="./img/noticia1.png">
						</div>
						<div class="leerMas">
							<a href="https://www.efpemusac.org/single-post/2020/06/30/Inicio-de-Clases-2do-Semestre-2020" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Leer más</a>
						</div>
					</div>

					<div class="col-md-6 col-xs-12" id="vision">
						<div>
							<h3>Asignación de Cursos</h3>
						</div>
						<div>
							<p>June 18, 2020</p>
						</div>
						<div class="cuadroEstudiantes">
							<img class="imgNoticia" src="./img/noticia2.png">
						</div>
						<div class="leerMas">
							<a href="https://www.efpemusac.org/single-post/2020/06/18/Asignaci%C3%B3n-de-Cursos" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Leer más</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-xs-12" id="mision">
						<div>
							<h3>Asignación de curso</h3>
						</div>
						<div>
							<p>June 18, 2020</p>
						</div>
						<div class="cuadroEstudiantes">
							<img class="imgNoticia" src="./img/noticia3.png">
						</div>
						<div class="leerMas">
							<a href="https://www.efpemusac.org/single-post/2020/06/18/Asignaci%C3%B3n-de-curso-en-diferente-Carrera-yo-Jornada" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Leer más</a>
						</div>
					</div>

					<div class="col-md-6 col-xs-12" id="vision">
						<div>
							<h3>Primera recuperación, 1S 2020</h3>
						</div>
						<div>
							<p>June 4, 2020</p>
						</div>
						<div class="cuadroEstudiantes">
							<img class="imgNoticia" src="./img/noticia4.png">
						</div>
						<div class="leerMas">
							<a href="https://www.efpemusac.org/single-post/2020/06/04/Primera-recuperaci%C3%B3n-primer-semestre-2020" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Leer más</a>
						</div>
					</div>
				</div>				
			</div>
		</main>

		<footer>
			<?php
				include_once 'footer.php';
			?>	
		</footer>

	</body>
</html>