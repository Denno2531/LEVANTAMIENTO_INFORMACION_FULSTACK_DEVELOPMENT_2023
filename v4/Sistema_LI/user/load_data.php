<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['user_name'] = $row['name'];
		$_SESSION['user_surnames'] = $row['surnames'];
		$_SESSION['user_email'] = $row['email'];
		$_SESSION['user_pass'] = $row['pass'];		
		$_SESSION['user_type'] = $row['permissions'];
		$_SESSION['user_rol'] = $row['rol'];
		$_SESSION['user_image'] = $row['image'];
		$_SESSION['image_updated_at'] = $row['image_updated_at'];
	}
}

$sql = "SELECT * FROM administratives WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['administratives_name'] = $row['name'];
		$_SESSION['administratives_surnames'] = $row['surnames'];
		$_SESSION['administratives_id'] = $row['id'];
		$_SESSION['administratives_sede'] = $row['sede'];
		$_SESSION['administratives_email'] = $row['email'];
		$_SESSION['administratives_cedula'] = $row['cedula'];
		$_SESSION['administratives_celular'] = $row['celular'];
		$_SESSION['administratives_pass'] = $row['pass'];
		$_SESSION['administratives_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['administratives_carrera'] = $row['carrer'];
		
	}
}

$sql = "SELECT * FROM students WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['student_name'] = $row['name'];
		$_SESSION['student_surnames'] = $row['surnames'];
		$_SESSION['student_sede'] = $row['sede'];
		$_SESSION['student_departamento'] = $row['departamento'];
		$_SESSION['student_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['student_cedula'] = $row['cedula'];
		$_SESSION['student_pass'] = $row ['pass'];
		$_SESSION['student_email'] = $row['email'];		
		$_SESSION['student_id'] = $row['id'];
		$_SESSION['student_phone'] = $row['phone'];
		$_SESSION['student_jerarquia'] = $row['jerarquia'];
		$_SESSION['student_address'] = $row['address'];
		$_SESSION['student_career'] = $row['career'];		
		$_SESSION['student_horas'] = $row['horas'];
		$_SESSION['student_horario'] = $row['horario'];
		$_SESSION['student_asistencia'] = $row['asistencia'];
		$_SESSION['student_documentation'] = $row['documentation'];
		$_SESSION['student_status'] = $row['estado'];
		$_SESSION['student_admission_date'] = $row['admission_date'];
		$_SESSION['student_jornada'] = $row['jornada'];
	}
}

$sql = "SELECT * FROM teachers WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['teacher_name'] = $row['name'];
		$_SESSION['teacher_surnames'] = $row['surnames'];
		$_SESSION['teacher_gender'] = $row['gender'];
		$_SESSION['teacher_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['teacher_cedula'] = $row['cedula'];
		$_SESSION['teacher_id'] = $row['id'];
		$_SESSION['teacher_pass'] = $row['pass'];
		$_SESSION['teacher_phone'] = $row['phone'];
		$_SESSION['teacher_address'] = $row['address'];
		$_SESSION['teacher_level_studies'] = $row['level_studies'];
		$_SESSION['teacher_email'] = $row['email'];
		$_SESSION['teacher_career'] = $row['career'];
		
	}
}

$sql = "SELECT * FROM emprendedor WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['empre_pass'] = $row['pass'];
		$_SESSION['empre_name'] = $row['name'];
		$_SESSION['empre_surnames'] = $row['surnames'];
		$_SESSION['empre_gender'] = $row['gender'];
		$_SESSION['empre_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['empre_curp'] = $row['cedula'];
		$_SESSION['empre_rfc'] = $row['address'];
		$_SESSION['empre_phone'] = $row['phone'];
		$_SESSION['empre_documentation'] = $row['email'];
		$_SESSION['empre_pass'] = $row['pass'];
		
	}
}


$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'] . '';

if (!file_exists($name_image_user)) {
	$sql = "SELECT image FROM users WHERE user = '" . $_SESSION['user_id'] . "'";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_image'] = $row['image'];
		}

		$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'] . '';

		if (file_exists($name_image_user)) {
		} else {
			$_SESSION['user_image'] = 'user.png';
		}
	}
}

if ($_SESSION['user_type'] == 'admin') {
	$_SESSION['user_type'] = 'Administrador';
}