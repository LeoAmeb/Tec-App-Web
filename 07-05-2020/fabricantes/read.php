<?php include ("../includes/db.php");
// Función para obtener el registro de Fabricantes y mostrarlos
// En los SELECTS necesarios
	$query = "SELECT id, nombre FROM fabricantes";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die ("no se pudo extraer la informacion de los fabricantes");
	}
	while ($row = mysqli_fetch_array($result)) {
		$id = $row['id'];
		$nombre = $row['nombre'];
		echo "<option value=".$id.">".$nombre."</option>";
	}
?>