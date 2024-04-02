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
    Error('Ingrese un ID correcto!!');
    header('Location: /modules/emprendedor');
    exit();
}

// Inicia la actualización del emprendedor
$sql_emprendedor = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";
$sql_user = "SELECT * FROM users WHERE user = '" . $_POST['txtuserid'] . "'";

mysqli_begin_transaction($conexion);
try {
    // Actualizar tabla emprendedor
    if ($result = $conexion->query($sql_emprendedor)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');
            if (empty($_POST['txtpass'])) {
                $sql_update_emprendedor = "UPDATE emprendedor SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemailupdate']). "', cedula = '" . trim($_POST['txtcedula']) . "', gender = '" . trim($_POST['selectgender']) . "', phone = '" . trim($_POST['txtphone']) ."', organization = '" . trim($_POST['selectorganization']) . "', nameorganization = '" . trim($_POST['txtnameorganization']) ."', state = '" . trim($_POST['selectstate']) . "', city = '" . trim($_POST['txtcity']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            } else {
                $passhash = hash("SHA256",(trim($_POST['txtpass'])));
                $sql_update_emprendedor = "UPDATE emprendedor SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemailupdate']). "', cedula = '" . trim($_POST['txtcedula']) . "', gender = '" . trim($_POST['selectgender']) . "', pass = '" . $passhash . "', phone = '" . trim($_POST['txtphone']) ."', organization = '" . trim($_POST['selectorganization']) . "', nameorganization = '" . trim($_POST['txtnameorganization']) ."', state = '" . trim($_POST['selectstate']) . "', city = '" . trim($_POST['txtcity']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            }

            if (mysqli_query($conexion, $sql_update_emprendedor)) {
                Info('Benefeciario actualizado.');
            } else {
                Error('Error al actualizar beneficiario.');
            }
        } else {
            Error('Este ID de emprendedor no existe.');
        }
    }

    // Actualizar tabla users
    if ($result = $conexion->query($sql_user)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');
            if (empty($_POST['txtpass'])) {
                $sql_update_user = "UPDATE users SET name ='" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemailupdate']). "', permissions = 'editor', rol = 'emprendedor', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            } else {
                $passhash = hash("SHA256",(trim($_POST['txtpass'])));
                $sql_update_user = "UPDATE users SET name ='" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemailupdate']). "', pass = '" . $passhash . "', permissions = 'editor', rol = 'emprendedor', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
            }

            if (mysqli_query($conexion, $sql_update_user)) {
                Info('Usuario actualizado.');
            } else {
                Error('Error al actualizar usuario.');
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

header('Location: /modules/emprendedor');
exit();
?>


# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
