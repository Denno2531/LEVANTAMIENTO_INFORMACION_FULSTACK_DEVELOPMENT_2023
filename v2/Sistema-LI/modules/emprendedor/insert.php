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
		Error('Este ID ya está en uso. Elige otro.');
		header('Location: /modules/emprendedor');
		exit();
	} else {
		$date = date('Y-m-d H:i:s');

		$sql_insert_user = "INSERT INTO users(user, name, surnames, email, pass, permissions, rol, image, created_at) VALUES('" . trim($_POST['txtuserid']) . "','" . trim($_POST['txtname']) . "', '" . trim($_POST['txtsurnames']) . "', '" . trim($_POST['txtaddress']) . "', '" . trim($_POST['txtpass']) . "', 'editor', 'empre', 'user.png','" . $date . "')";	
			
		if (mysqli_query($conexion, $sql_insert_user)) {
			$sql_insert_administrative = "INSERT INTO emprendedor(user, name, surnames, date_of_birth, gender, cedula, pass, phone, address, email, created_at) VALUES('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtname']) . "', '" . trim($_POST['txtsurnames']) . "', '" . trim($_POST['dateofbirth']) . "', '" . trim($_POST['selectgender']) . "', '" . trim($_POST['txtcurp']) . "', '" . trim($_POST['txtpass']) . "', '" . trim($_POST['txtphone']) . "', '" . trim($_POST['txtrfc']) . "', '" . trim($_POST['txtaddress']) . "','" . $date . "')";			

			if (mysqli_query($conexion, $sql_insert_administrative)) {

				Info('Emprendedor agregado.');
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