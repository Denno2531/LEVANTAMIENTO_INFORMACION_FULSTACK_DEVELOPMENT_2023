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

		if (empty($_POST['txtpass'])) {
		$sql_update_empre = "UPDATE emprendedor SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . 
		"', date_of_birth = '" . trim($_POST['dateofbirth']) ."', city = '" . trim($_POST['txtcity']) .
		"', workinghours_start = '" . trim($_POST['timeworkinghours_start'])."', workinghours_end = '" . trim($_POST['timeworkinghours_end']).
		"', education = '" . trim($_POST['selecteducation']) ."', socialnetworks = '" . trim($_POST['selectsocialnetworks']) .
		"', salesyear = '" . trim($_POST['txtsalesyear']) . "', salesyear1 = '" . trim($_POST['txtsalesyear1']) ."', salesyear2 = '" . 
		trim($_POST['txtsalesyear2']) ."', salesyear3 = '" . trim($_POST['txtsalesyear3']) .
		"', salesyear4 = '" . trim($_POST['txtsalesyear4']) ."', gender = '" . trim($_POST['selectgender']) ."', cedula = '" . trim($_POST['txtcedula']) .
		"', rfc = '" . trim($_POST['txtrfc']) ."', phone = '" . trim($_POST['txtphone']) ."', email = '" . trim($_POST['txtuseremail']) .
		"', organization = '" . trim($_POST['selectorganization']).	"', nameorganization = '" . trim($_POST['txtnameorganization']) ."', state = '" . trim($_POST['selectstate']) .
		"', stardate = '" . trim($_POST['datestardate']) ."', socialsales = '" . trim($_POST['selectsocialsales']) .		
		"', heritage = '" . trim($_POST['txtheritage']) . 
		"', heritage1 = '" . trim($_POST['txtheritage1']) ."', heritage2 = '" . trim($_POST['txtheritage2']) .
		"', heritage3 = '" . trim($_POST['txtheritage3']) ."', heritage4 = '" . trim($_POST['txtheritage4']) .  
		 "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
		
		if (mysqli_query($conexion, $sql_update)) 
			$sql_update = "UPDATE users SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', email = '" . trim($_POST['txtuseremail']) . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Beneficiario actualizado.');
		} else {
			Error('Error al actualizar.');
		}

		}else {
			$passhash = hash("SHA256",(trim($_POST['txtpass'])));
		$sql_update_empre = "UPDATE emprendedor SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . 
		"', date_of_birth = '" . trim($_POST['dateofbirth']) ."', city = '" . trim($_POST['txtcity']) .
		"', workinghours_start = '" . trim($_POST['timeworkinghours_start'])."', workinghours_end = '" . trim($_POST['timeworkinghours_end']).
		"', education = '" . trim($_POST['selecteducation']) ."', socialnetworks = '" . trim($_POST['selectsocialnetworks']) .
		"', salesyear = '" . trim($_POST['txtsalesyear']) . "', salesyear1 = '" . trim($_POST['txtsalesyear1']) ."', salesyear2 = '" . 
		trim($_POST['txtsalesyear2']) ."', salesyear3 = '" . trim($_POST['txtsalesyear3']) .
		"', salesyear4 = '" . trim($_POST['txtsalesyear4']) ."', gender = '" . trim($_POST['selectgender']) ."', cedula = '" . trim($_POST['txtcedula']) .
		"', rfc = '" . trim($_POST['txtrfc']) .	 "', pass = '" . $passhash ."', phone = '" . trim($_POST['txtphone']) .
		"', email = '" . trim($_POST['txtuseremail']) .	"', organization = '" . trim($_POST['selectorganization']).
			"', nameorganization = '" . trim($_POST['txtnameorganization']) ."', state = '" . trim($_POST['selectstate']) .
		"', stardate = '" . trim($_POST['datestardate']) ."', socialsales = '" . trim($_POST['selectsocialsales']) .		
		"', heritage = '" . trim($_POST['txtheritage']) . "', heritage1 = '" . trim($_POST['txtheritage1']) .
		"', heritage2 = '" . trim($_POST['txtheritage2']) ."', heritage3 = '" . trim($_POST['txtheritage3']) .
		"', heritage4 = '" . trim($_POST['txtheritage4']) .  "', updated_at = '" . $date . "' WHERE user = '" .	trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update))
			$sql_update = "UPDATE users SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', email = '" . trim($_POST['txtuseremail']) . "', pass = '" . $passhash . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Beneficiario actualizado.');
		} else {
			Error('Error al actualizar.');
		}

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
