<?php
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

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
	$_SESSION['empre_nameorganization'] = array();


	$i = 0;
				$sql = "SELECT * FROM emprendedor WHERE user LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR surnames LIKE '%" . $_POST['search'] . "%' OR cedula LIKE '%" . $_POST['search'] . "%' ORDER BY name";

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['empre_pass'][$i] = $row['pass'];
						$_SESSION['empre_name'][$i] = $row['name'];
						$_SESSION['empre_surname'][$i] = $row['surnames'];
						$_SESSION['empre_date_of_birth'][$i] = $row['date_of_birth'];
						$_SESSION['empre_city'][$i] = $row['city'];
						$_SESSION['empre_workinghours_start'] = $row['workinghours_start'];	
						$_SESSION['empre_workinghours_end'] = $row['workinghours_end'];	
						$_SESSION['empre_education'][$i] = $row['education'];
						$_SESSION['empre_socialnetworks'][$i] = $row['socialnetworks'];
						$_SESSION['empre_salesyear'][$i] = $row['salesyear'];
						$_SESSION['empre_salesyear1'][$i] = $row['salesyear1'];
						$_SESSION['empre_salesyear2'][$i] = $row['salesyear2'];
						$_SESSION['empre_salesyear3'][$i] = $row['salesyear3'];
						$_SESSION['empre_salesyear4'][$i] = $row['salesyear4'];
						$_SESSION['empre_heritage'][$i] = $row['heritage'];
						$_SESSION['empre_heritage1'][$i] = $row['heritage1'];
						$_SESSION['empre_heritage2'][$i] = $row['heritage2'];
						$_SESSION['empre_heritage3'][$i] = $row['heritage3'];
						$_SESSION['empre_heritage4'][$i] = $row['heritage4'];
						$_SESSION['empre_gender'][$i] = $row['gender'];
						$_SESSION['empre_cedula'][$i] = $row['cedula'];
						$_SESSION['empre_rfc'][$i] = $row['rfc'];	
						$_SESSION['empre_phone'][$i] = $row['phone'];
						$_SESSION['empre_email'][$i] = $row['email'];
						$_SESSION['empre_organization'][$i] = $row['organization'];
						$_SESSION['empre_nameorganization'][$i] = $row['nameorganization'];
						$_SESSION['empre_state'][$i] = $row['state'];
						$_SESSION['empre_startdate'][$i] = $row['startdate'];
						$_SESSION['empre_socialsales'][$i] = $row['socialsales'];

						
		


						$i += 1;
					}
				}
				$_SESSION['total_users'] = count($_SESSION['user_id']);
			} else {
				$_SESSION['user_id'] = array();
				$_SESSION['empre_pass'] = array();
				$_SESSION['empre_name'] = array();
				$_SESSION['empre_surname'] = array();
				$_SESSION['empre_date_of_birth'] = array();
				$_SESSION['empre_city'] = array();
				$_SESSION['empre_workinghours_start'] = array();
				$_SESSION['empre_workinghours_end'] = array();
				$_SESSION['empre_education'] = array();
				$_SESSION['empre_socialnetworks'] = array();
				$_SESSION['empre_salesyear'] = array();
				$_SESSION['empre_salesyear1'] = array();
				$_SESSION['empre_salesyear2'] = array();
				$_SESSION['empre_salesyear3'] = array();
				$_SESSION['empre_salesyear4'] = array();
				$_SESSION['empre_heritage'] = array();
				$_SESSION['empre_heritage1'] = array();
				$_SESSION['empre_heritage2'] = array();
				$_SESSION['empre_heritage3'] = array();
				$_SESSION['empre_heritage4'] = array();
				$_SESSION['empre_gender'] = array();
				$_SESSION['empre_cedula'] = array();
				$_SESSION['empre_rfc'] = array();
				$_SESSION['empre_phone'] = array();
				$_SESSION['empre_email'] = array();
				$_SESSION['empre_organization'] = array();
				$_SESSION['empre_nameorganization'] = array();
				$_SESSION['empre_state'] = array();
				$_SESSION['empre_startdate'] = array();
				$_SESSION['empre_socialsales'] = array();
			




				$i = 0;

				$sql = "SELECT * FROM emprendedor ORDER BY user DESC, user, name LIMIT $inicio, $max";

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['empre_pass'][$i] = $row['pass'];
						$_SESSION['empre_name'][$i] = $row['name'];
						$_SESSION['empre_surname'][$i] = $row['surnames'];
						$_SESSION['empre_date_of_birth'][$i] = $row['date_of_birth'];
						$_SESSION['empre_city'][$i] = $row['city'];
						$_SESSION['empre_workinghours_start'] = $row['workinghours_start'];	
						$_SESSION['empre_workinghours_end'] = $row['workinghours_end'];	
						$_SESSION['empre_education'][$i] = $row['education'];
						$_SESSION['empre_socialnetworks'][$i] = $row['socialnetworks'];
						$_SESSION['empre_salesyear'][$i] = $row['salesyear'];
						$_SESSION['empre_salesyear1'][$i] = $row['salesyear1'];
						$_SESSION['empre_salesyear2'][$i] = $row['salesyear2'];
						$_SESSION['empre_salesyear3'][$i] = $row['salesyear3'];
						$_SESSION['empre_salesyear4'][$i] = $row['salesyear4'];
						$_SESSION['empre_heritage'][$i] = $row['heritage'];
						$_SESSION['empre_heritage1'][$i] = $row['heritage1'];
						$_SESSION['empre_heritage2'][$i] = $row['heritage2'];
						$_SESSION['empre_heritage3'][$i] = $row['heritage3'];
						$_SESSION['empre_heritage4'][$i] = $row['heritage4'];
						$_SESSION['empre_gender'][$i] = $row['gender'];
						$_SESSION['empre_cedula'][$i] = $row['cedula'];
						$_SESSION['empre_rfc'][$i] = $row['rfc'];	
						$_SESSION['empre_phone'][$i] = $row['phone'];
						$_SESSION['empre_email'][$i] = $row['email'];
						$_SESSION['empre_organization'][$i] = $row['organization'];
						$_SESSION['empre_nameorganization'][$i] = $row['nameorganization'];
						$_SESSION['empre_state'][$i] = $row['state'];
						$_SESSION['empre_startdate'][$i] = $row['startdate'];
						$_SESSION['empre_socialsales'][$i] = $row['socialsales'];


						$i += 1;
					}
				}
				$_SESSION['total_users'] = count($_SESSION['user_id']);
			}
		







# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

