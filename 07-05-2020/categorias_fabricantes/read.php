<?php include ("../includes/db.php");
// Función para visualizar las categorías registradas
// en la BD para después usarla en los SELECTS necesarios
	$query = "SELECT id, nombre FROM categorias_fabricantes";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die ("no se pudo extraer la informacion de las categorias de los fabricantes");
	}
	while ($row = mysqli_fetch_array($result)) {
		$id = $row['id'];
		$nombre = $row['nombre'];
		echo "<option value=".$id.">".$nombre."</option>";
	}
?>