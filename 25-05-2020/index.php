<?php

	ob_start();

	require_once("controllers/controller.php");
	require_once("models/enlaces.php");
	require_once("models/model.php");
	//Modulo venta
	require_once("models/venta_model.php");
	require_once("controllers/venta_controller.php");

	$mvc = new MvcController();
	$mvc->plantilla();

?>