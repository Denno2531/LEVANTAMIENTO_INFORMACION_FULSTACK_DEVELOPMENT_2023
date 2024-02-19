<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);
$passhash = hash("SHA256",(trim($_POST['txtpass'])));


if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/emprendedor');
	exit();
}
$sql_check_user = "SELECT * FROM emprendedor WHERE cedula = '" . $_POST['txtcedula'] . "'";
$result_check_user = $conexion->query($sql_check_user);

if (mysqli_num_rows($result_check_user) > 0) {
    Error('Este usuario ya está registrado, favor validar por su cédula.');
    header('Location: /modules/emprendedor');
    exit();
} else {

$sql = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		Error('Este ID ya está en uso. Elige otro.');
		header('Location: /modules/emprendedor');
		exit();
	} else {
		$date = date('Y-m-d H:i:s');

		$sql_insert_user = "INSERT INTO users(user, name, surnames, email, pass, permissions, rol, image, created_at) VALUES('" . trim($_POST['txtuserid']) . "','" . trim($_POST['txtname']) . "', '" . trim($_POST['txtsurnames']) .  "', '" . trim($_POST['txtuseremail']) . "', '" . $passhash ."', 'editor', 'empre', 'user.png','" . $date . "')";	
			
		if (mysqli_query($conexion, $sql_insert_user)) {
			$sql_insert_administrative = "INSERT INTO emprendedor(user, name, surnames,city, date_of_birth,workinghours_start,workinghours_end,
			education,socialnetworks,salesyear,salesyear1,salesyear2,salesyear3,salesyear4,heritage,heritage1,
			heritage2,heritage3,heritage4, gender, cedula,rfc, pass, phone,email,organization,nameorganization,
			state,startdate,socialsales, created_at) VALUES('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtname']) .
			"', '" . trim($_POST['txtsurnames']) . "', '". trim($_POST['txtcity'])."', '" . trim($_POST['dateofbirth']) .
			"', '". trim($_POST['timeworkinghours_start'])."', '". trim($_POST['timeworkinghours_end']).
			"', '". trim($_POST['selecteducation']).
			"', '". trim($_POST['selectsocialnetworks'])."', '". trim($_POST['txtsalesyear']).
			"', '". trim($_POST['txtsalesyear1'])."', '". trim($_POST['txtsalesyear2']).
			"', '". trim($_POST['txtsalesyear3'])."', '". trim($_POST['txtsalesyear4']).
			"', '". trim($_POST['txtheritage'])."', '". trim($_POST['txtheritage1'])."', '". trim($_POST['txtheritage2']).
			"', '". trim($_POST['txtheritage3'])."', '". trim($_POST['txtheritage4'])."', '". trim($_POST['selectgender']) .
			 "', '" . trim($_POST['txtcedula']) . "', '" . trim($_POST['txtrfc']) .  "', '" . $passhash . "', '" . trim($_POST['txtphone']) . "', '" . trim($_POST['txtuseremail']) . 
			 "', '" . trim($_POST['selectorganization']) ."', '" . trim($_POST['txtnameorganization']) .
			 "', '" . trim($_POST['selectstate']) ."', '" . trim($_POST['datestartdate']) ."', '" . trim($_POST['selectsocialsales']) .
			  "','" . $date . "')";			

			if (mysqli_query($conexion, $sql_insert_administrative)) {

				Info('Beneficiario agregado.');
			} else {
				$sql_delete_users = "DELETE FROM users WHERE user = '" . trim($_POST['txtuserid']) . "'";

				if (mysqli_query($conexion, $sql_delete_users)) {
					Error('Error al guardar.');
				}
			}
		} else {
			Error('Error al guardar.');
		}
		header('Location: /modules/emprendedor');
		exit();
	}
}
}



# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

