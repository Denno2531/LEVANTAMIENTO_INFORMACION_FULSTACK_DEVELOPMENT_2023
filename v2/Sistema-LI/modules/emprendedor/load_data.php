<?php
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(career) AS total FROM careers";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		if ($row['total'] == 0) {
			Error('Crea como mínimo una carrera antes de agregar alumnos.');
			header('Location: /modules/careers');
			exit();
		} else {
			$sql = "SELECT COUNT(user) AS total FROM emprendedor";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$tpages = ceil($row['total'] / $max);
				}
			}

			if (!empty($_POST['search'])) {
				$_POST['search'] = trim($_POST['search']);
				$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

				$_SESSION['user_id'] = array();
				$_SESSION['empre_name'] = array();
				$_SESSION['empre_surname'] = array();
				$_SESSION['empre_date'] = array();

				$i = 0;

				$sql = "SELECT * FROM emprendedor WHERE user LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR surnames LIKE '%" . $_POST['search'] . "%' OR cedula LIKE '%" . $_POST['search'] . "%' ORDER BY name";

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['empre_name'][$i] = $row['name'];
						$_SESSION['empre_surname'][$i] = $row['surnames'];
						$_SESSION['empre_date'][$i] = $row['email'];

						$i += 1;
					}
				}
				$_SESSION['total_users'] = count($_SESSION['user_id']);
			} else {
				$_SESSION['user_id'] = array();
				$_SESSION['empre_name'] = array();
				$_SESSION['empre_surname'] = array();
				$_SESSION['empre_date'] = array();

				$i = 0;

				$sql = "SELECT * FROM emprendedor ORDER BY user DESC, user, name LIMIT $inicio, $max";

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['empre_name'][$i] = $row['name'];
						$_SESSION['empre_surname'][$i] = $row['surnames'];
						$_SESSION['empre_date'][$i] = $row['email'];

						$i += 1;
					}
				}
				$_SESSION['total_users'] = count($_SESSION['user_id']);
			}
		}
	}
}