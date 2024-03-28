
<?php

// Incluye el archivo que verifica el acceso de roles de administrador y editor
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

// Función para imprimir un console.log desde PHP
function console($datos)
{
	$console = $datos;
	if (is_array($console)) {
		$console = implode(',', $console);
	}
	echo "<script>console.log('Console: " . $console . "');</script>";
}

// Cargando datos de reportes
for ($i = 0; $i < min(8, $_SESSION['total_users']); $i++) {

	// Reportes de send_one
	$sql_one = "SELECT * FROM send_one";
	if ($result_one = $conexion->query($sql_one)) {
		$j = 0;
		$_SESSION['num_one'] = array();
		while ($row_one = mysqli_fetch_array($result_one)) {
			if ($_SESSION['user_id'][$i] == $row_one['user']) {
				$_SESSION['num_one'][$j] = $row_one['num'];
			}
			$j += 1;
		}
		$name_send = "";
		$name_send = trim($_SESSION['user_id'][$i]);
		if (($_SESSION['num_one']) != 0) {
			$_SESSION["send" . $name_send] = count($_SESSION['num_one']);
		} else {
			$_SESSION["send" . $name_send] = 0;
		}
	}

	// Reportes de informes quinceanales
	$sql_infoq = "SELECT * FROM infoq";
	if ($result_infoq = $conexion->query($sql_infoq)) {
		$j = 0;
		$_SESSION['num_infoq'] = array();
		while ($row_infoq = mysqli_fetch_array($result_infoq)) {
			if ($_SESSION['user_id'][$i] == $row_infoq['user']) {
				$_SESSION['num_infoq'][$j] = $row_infoq['num'];
			}
			$j += 1;
		}
		$name_infoq = "";
		$name_infoq = trim($_SESSION['user_id'][$i]);
		if (($_SESSION['num_infoq']) != 0) {
			$_SESSION["infoq" . $name_infoq] = count($_SESSION['num_infoq']);
		} else {
			$_SESSION["infoq" . $name_infoq] = 0;
		}
	}

	// Reportes de send_two
	$sql_two = "SELECT * FROM send_two";
	if ($result_two = $conexion->query($sql_two)) {
		$j = 0;
		$_SESSION['num_two'] = array();
		while ($row_two = mysqli_fetch_array($result_two)) {
			if ($_SESSION['user_id'][$i] == $row_two['user']) {
				$_SESSION['num_two'][$j] = $row_two['num'];
			}
			$j += 1;
		}
		$name_two = "";
		$name_two = trim($_SESSION['user_id'][$i]);
		if (($_SESSION['num_two']) != 0) {
			$_SESSION["two" . $name_two] = count($_SESSION['num_two']);
		} else {
			$_SESSION["two" . $name_two] = 0;
		}
	}
}

// ⚠⚠⚠ NO ELIMINES ⚠⚠⚠
// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 202450
// Betty Lizeth Rodriguez Salas[SaoriCoder]
// Angelus Infernus
// ⚠⚠⚠ NO ELIMINES ⚠⚠⚠

?>

