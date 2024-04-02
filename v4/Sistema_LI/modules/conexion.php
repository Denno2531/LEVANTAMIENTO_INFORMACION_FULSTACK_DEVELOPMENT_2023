<?php
date_default_timezone_set('America/Guayaquil');

$conexion = mysqli_connect("localhost", "root", "admin", "db_li");

if (mysqli_connect_errno()) {
	printf("Falló la conexión a la base de datos: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');