<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (isset($_POST['btn-school-period']) && $_POST['btn-school-period'] = 'true') {
	if (isset($_POST['check-school-period'])) {
		$_SESSION['school_period'] = $_POST['check-school-period' . $i];
		setcookie('school_period', $_POST['check-school-period' . $i], time() + 365 * 24 * 60 * 60, "/");
	}
	header('Location: /');
}



# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

