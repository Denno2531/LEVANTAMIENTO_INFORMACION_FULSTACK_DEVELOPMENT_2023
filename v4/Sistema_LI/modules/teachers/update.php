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
	header('Location: /modules/teachers');
	exit();
}

$sql_teachers = "SELECT * FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";
$sql_user = "SELECT * FROM users WHERE user = '" . $_POST['txtuserid'] . "'";

mysqli_begin_transaction($conexion);
try {
    // Actualizar tabla teachers
    if ($result = $conexion->query($sql_teachers)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');
            if (empty($_POST['txtpass'])) {
                $sql_update_teachers = "UPDATE teachers SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectgender']) . "', cedula = '" . trim($_POST['txtcedula']) . "', id = '" . trim($_POST['txtid']) . "',  phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', level_studies = '" . trim($_POST['selectlevelstudies']) . "', email = '" . trim($_POST['txtemail']) . "', career = '" . trim($_POST['selectCareer']) .  "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            } else {
                $passhash = hash("SHA256",(trim($_POST['txtpass'])));
                $sql_update_teachers = "UPDATE teachers SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectgender']) . "', cedula = '" . trim($_POST['txtcedula']) . "', pass = '" . $passhash . "', id = '" . trim($_POST['txtid']) . "',  phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', level_studies = '" . trim($_POST['selectlevelstudies']) . "', email = '" . trim($_POST['txtemail']) . "', career = '" . trim($_POST['selectCareer']) .  "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            }
            

            if (mysqli_query($conexion, $sql_update_teachers)) {
                Info('Teacher actualizado.');
            } else {
                Error('Error al actualizar.');
            }
        } else {
            Error('Este ID de alumno no existe.');
        }
    }

    // Actualizar tabla users
    if ($result = $conexion->query($sql_user)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');
            if (empty($_POST['txtpass'])) {
                $sql_update_user = "UPDATE users SET name ='" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemail']). "', permissions = 'editor', rol = 'teacher', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
                
            } else {
                $passhash = hash("SHA256",(trim($_POST['txtpass'])));
                $sql_update_user = "UPDATE users SET name ='" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemail']). "', pass = '" . $passhash . "', permissions = 'editor', rol = 'teacher', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            }
            

            if (mysqli_query($conexion, $sql_update_user)) {
                Info('Usuario actualizado.');
            } else {
                Error('Error al actualizar.');
            }
        } else {
            Error('Este ID de usuario no existe.');
        }
    }

    mysqli_commit($conexion);
} catch (Exception $e) {
    mysqli_rollback($conexion);
    Error('Error al actualizar.');
}

header('Location: /modules/teachers');
exit();










# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

