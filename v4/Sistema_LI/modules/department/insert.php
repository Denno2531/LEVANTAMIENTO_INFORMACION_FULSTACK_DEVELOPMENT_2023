<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtdepartment'])) {
	header('Location: /');
	exit();
}

$_POST['txtdepartment'] = trim($_POST['txtdepartment']);

if ($_POST['txtdepartment'] == '') {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Ingrese un ID correcto.';
	header('Location: /modules/department');
	exit();
}

$sql = "SELECT * FROM department WHERE id_department = '" . $_POST['txtdepartment'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'El departamento que intenta crear ya éxiste.';

		header('Location: /modules/department');
	} else {
		$_POST['txtdepartmentdescription'] = mysqli_real_escape_string($conexion, $_POST['txtdepartmentdescription']);
		$sql_insert = "INSERT INTO department(id_department, name, description, teacher) VALUES('" . $_POST['txtdepartment'] . "', '" . $_POST['txtdepartmentname'] . "', '" . $_POST['txtdepartmentdescription'] . "', '" . $_POST['selectUserTeacher'] . "')";

		if (mysqli_query($conexion, $sql_insert)) {
			$_SESSION['msgbox_error'] = 0;
			$_SESSION['msgbox_info'] = 1;
			$_SESSION['text_msgbox_info'] = 'Departamento agregada.';
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Error al guardar.';
		}

		header('Location: /modules/department');
	}
}




# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

