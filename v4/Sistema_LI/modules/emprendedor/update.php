<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/emprendedor');
	exit();
}

$sql = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$date = date('Y-m-d H:i:s');
	
		$sql_update_empre = "UPDATE emprendedor SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', cedula = '" . trim($_POST['txtcedula']) .
		  "', date_of_birth = '" . trim($_POST['dateofbirth']) .
		"', salesyear = '" . trim($_POST['salesyear']) . "', salesyear1 = '" . trim($_POST['salesyear1']) ."', salesyear2 = '" . 
		trim($_POST['salesyear2']) ."', salesyear3 = '" . trim($_POST['salesyear3']) ."', rfc = '" . trim($_POST['rfc']) ."', salesyear4 = '" . trim($_POST['salesyear4']) .
		"', heritage = '" . trim($_POST['heritage']) ."', heritage1 = '" . trim($_POST['heritage1']) ."', heritage2 = '" . trim($_POST['heritage2']) .
		"', heritage3 = '" . trim($_POST['heritage3']) ."', heritage4 = '" . trim($_POST['heritage4']) ."', gender = '" . trim($_POST['selectGender']) . "', phone = '" .
		 trim($_POST['txtphone']) . "', email = '" . trim($_POST['txtemail']) . "', organization = '" . trim($_POST['selectorganization']) . "', pass = '" . trim($_POST['txtpass']) . 
		 "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update))
			$sql_update = "UPDATE users SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', email = '" . trim($_POST['txtemailupdate']) . "', pass = '" . $passhash . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Beneficiario actualizado.');
		} else {
			Error('Error al actualizar.');
		}
		
		header('Location: /modules/emprendedor');
		exit();
	} else {
		Error('Este ID de beneficiario no existe.');
		header('Location: /modules/emprendedor');
		exit();
	}
}



# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
