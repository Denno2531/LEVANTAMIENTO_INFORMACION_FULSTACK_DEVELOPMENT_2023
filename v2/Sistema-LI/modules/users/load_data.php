<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT COUNT(user) AS total FROM users";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['user_id'] = array();
	$_SESSION['user_name'] = array();
	$_SESSION['user_surnames'] = array();
	$_SESSION['user_pass'] = array();
	$_SESSION['user_email'] = array();
	$_SESSION['user_type'] = array();
	$_SESSION['user_rol'] = array();

	$i = 0;

	$sql = "SELECT * FROM users WHERE user LIKE '%" . $_POST['search'] . "%' OR email LIKE '%" . $_POST['search'] . "%' OR permissions LIKE '%" . $_POST['search'] . "%' ORDER BY user";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'][$i] = $row['user'];
			$_SESSION['user_name'][$i] = $row['name'];
	        $_SESSION['user_surnames'][$i] = $row['surnames'];
	        $_SESSION['user_pass'][$i] = $row['pass'];
			$_SESSION['user_email'][$i] = $row['email'];
			$_SESSION['user_type'][$i] = $row['permissions'];
			$_SESSION['user_rol'][$i] = $row['rol'];

			$i += 1;
		}
	}
	$_SESSION['total_users'] = count($_SESSION['user_id']);
} else {
	$_SESSION['user_id'] = array();
	$_SESSION['user_name'] = array();
	$_SESSION['user_surnames'] = array();
	$_SESSION['user_pass'] = array();
	$_SESSION['user_email'] = array();
	$_SESSION['user_type'] = array();
	$_SESSION['user_rol'] = array();


	$i = 0;

	$sql = "SELECT * FROM users ORDER BY user LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'][$i] = $row['user'];
			$_SESSION['user_name'][$i] = $row['name'];
	        $_SESSION['user_surnames'][$i] = $row['surnames'];
	        $_SESSION['user_pass'][$i] = $row['pass'];
			$_SESSION['user_email'][$i] = $row['email'];
			$_SESSION['user_type'][$i] = $row['permissions'];
			$_SESSION['user_rol'][$i] = $row['rol'];

			$i += 1;
		}
	}
	$_SESSION['total_users'] = count($_SESSION['user_id']);
}