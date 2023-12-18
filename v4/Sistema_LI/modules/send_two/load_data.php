<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(num) AS total FROM send_two";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['user_id'] = array();
	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();
	$_SESSION['send_description'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_two WHERE num LIKE '%" . $_POST['search'] . "%' OR archivo LIKE '%" . $_POST['search'] . "%' OR user LIKE '%" . $_POST['search'] . "%' OR num LIKE '%" . $_POST['search'] . "%' OR descripcion LIKE '%" . $_POST['search'] . "%' ORDER BY num";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'][$i] = $row['user'];
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['send_archivo'][$i] = $row['archivopdf'];
			$_SESSION['send_description'][$i] = $row['descripcion'];

			$i += 1;
		}
	}
	$_SESSION['total_infoq'] = count($_SESSION['num']);
} else {
	$_SESSION['user_id'] = array();
	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_two ORDER BY num";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'][$i] = $row['user'];
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['send_archivo'][$i] = $row['archivopdf'];

			$i += 1;
		}
	}
	$_SESSION['total_send'] = count($_SESSION['num']);
}