<?php
date_default_timezone_set('America/Guayaquil');

<<<<<<< HEAD
$conexion = mysqli_connect("localhost", "root", "angel2857", "db_li");
=======
>>>>>>> dc8c83452017891a6371ff86a660ec3474b39390

if (mysqli_connect_errno()) {
	printf("Falló la conexión a la base de datos: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');