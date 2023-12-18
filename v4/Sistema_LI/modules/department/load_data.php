<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(id_department) AS total FROM department";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['id_department'] = array();
	$_SESSION['department_name'] = array();

	$i = 0;

	$sql = "SELECT * FROM department WHERE id_department LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' ORDER BY name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['id_department'][$i] = $row['id_department'];
			$_SESSION['department_name'][$i] = $row['name'];

			$i += 1;
		}
	}
	$_SESSION['total_department'] = count($_SESSION['id_department']);
} else {
	$_SESSION['id_department'] = array();
	$_SESSION['department_name'] = array();

	$i = 0;

	$sql = "SELECT * FROM department ORDER BY name LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['id_department'][$i] = $row['id_department'];
			$_SESSION['department_name'][$i] = $row['name'];

			$i += 1;
		}
	}
	$_SESSION['total_department'] = count($_SESSION['id_department']);
}




# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

