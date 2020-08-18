<?php
    include 'validate_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>

    <style type="text/css">
		input[type=text], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		  margin-top: 6px;
		  margin-bottom: 16px;
		  resize: vertical;
		}

		input[type=submit] {
		  background-color: grey;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #C0C2C6;
		}

    </style>

</head>
<body>

	<div class="container">
		<h3>Contactanos:</h3>
		<h6><b>Correo: </b>revoluxiongc@gmail.com</h6>
		<h6><b>Facebook: </b><a href="https://www.facebook.com/revoluxiongc/" target="_blank">Revoluxion Game Center</a></h6>
		<h6><b>Número de Teléfono: </b> 834 248 7367</h6>
		<br>
		<form action="#">
			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" name="nombre" placeholder="Nombre..">

			<label for="email">Correo Electrónico</label>
			<input type="text" id="email" name="email" placeholder="Email..">

			<label for="subject">Mensaje</label>
			<textarea id="subject" name="subject" placeholder="Escribenos.." style="height:200px"></textarea>

			<input type="submit" value="Enviar">
		</form>
	</div>


<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>