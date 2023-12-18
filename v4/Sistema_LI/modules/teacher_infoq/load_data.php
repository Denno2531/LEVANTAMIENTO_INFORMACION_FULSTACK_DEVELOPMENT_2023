<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(num) AS total FROM v_infoq_students_teacher";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['id_infoq'] = array();
	$_SESSION['userinfoq_name'] = array();

	$i = 0;

	$sql = "SELECT * FROM v_infoq_students_teacher WHERE num LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' ORDER BY num";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['id_infoq'][$i] = $row['num'];
			$_SESSION['userinfoq_name'][$i] = $row['name'];
			$_SESSION['userinfoq_surname'][$i] = $row['surnames'];
			$_SESSION['idinfoq_teache'][$i] = $row['teacher'];
			$_SESSION['idinfoq_estudents'][$i] = $row['user'];
			$_SESSION['infoq_estudent_pdf'][$i] = $row['archivopdf'];

			$i += 1;
		}
	}
	$_SESSION['total_infoq'] = count($_SESSION['id_infoq']);
} else {
	$_SESSION['id_infoq'] = array();
	$_SESSION['userinfoq_name'] = array();

	$i = 0;

	$sql = "SELECT * FROM v_infoq_students_teacher WHERE teacher = '" . $_SESSION['user'] . "' ORDER BY name LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['id_infoq'][$i] = $row['num'];
			$_SESSION['userinfoq_name'][$i] = $row['name'];
			$_SESSION['userinfoq_surname'][$i] = $row['surnames'];
			$_SESSION['idinfoq_teache'][$i] = $row['teacher'];
			$_SESSION['idinfoq_estudents'][$i] = $row['user'];
			$_SESSION['infoq_estudent_pdf'][$i] = $row['archivopdf'];

			$i += 1;
		}
	}
	$_SESSION['total_infoq'] = count($_SESSION['id_infoq']);
}




# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

