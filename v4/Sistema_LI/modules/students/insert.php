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
	header('Location: /modules/students');
	exit();
}

$sql_check_user = "SELECT * FROM students WHERE cedula = '" . $_POST['txtcedula'] . "'";
$result_check_user = $conexion->query($sql_check_user);

if (mysqli_num_rows($result_check_user) > 0) {
    Error('Este usuario ya está registrado, favor validar por su cédula.');
    header('Location: /modules/students');
    exit();
} else {
    $sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            Error('Este ID ya está en uso. Elige otro.');
            header('Location: /modules/students');
            exit();
        } else {
            $date = date('Y-m-d H:i:s');
            $birth =  date('Y-m-d');

            $sql_insert_user = "INSERT INTO users(user, name, surnames, email, pass, permissions, rol, image, created_at) VALUES('" . trim($_POST['txtuserid']) . "','" . trim($_POST['txtname']) . "', '" . trim($_POST['txtsurnames']) . "', '" . trim($_POST['txtuseremail']) . "', '" . $passhash . "', 'editor', 'student', 'user.png','" . $date . "')";

            if (mysqli_query($conexion, $sql_insert_user)) {
                $sql_insert_teacher = "INSERT INTO students(user, name, surnames, email, cedula, pass, id, sede, date_of_birth, phone, address, career, horas, asistencia, horario, documentation, estado, departamento, jerarquia, jornada, created_at, admission_date, finish_date) VALUES('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtname']) . "', '" . trim($_POST['txtsurnames']) . "','" . trim($_POST['txtuseremail']) . "', '" . trim($_POST['txtcedula']) . "', '" . $passhash . "', '" . trim($_POST['txtid']) . "','" . trim($_POST['selectSede']) . "', '" . $birth . "', '" . trim($_POST['txtphone']) . "', '" . trim($_POST['txtaddress']) . "', '" . trim($_POST['selectCareer']) . "', '" . trim($_POST['txttotalhours_hidden']) . "','" . trim($_POST['txtuserdates']) . "', '" . trim($_POST['txtuserhours']) . "', '" . trim($_POST['selectDocumentation']) . "','" . trim($_POST['selectEstado']) . "','" . trim($_POST['selectDepartamento']) . "','" . trim($_POST['selectJerarquia']) . "','" . trim($_POST['selectJornada']) . "','" . $date . "', '" . trim($_POST['dateadmission']) . "',  '" . trim($_POST['datefinish']) . "')";

                if (mysqli_query($conexion, $sql_insert_teacher)) {
                    Info('Alumno agregado.');
                } else {
                    $sql_delete_users = "DELETE FROM users WHERE user = '" . trim($_POST['txtuserid']) . "'";

                    if (mysqli_query($conexion, $sql_delete_users)) {
                        Error('Error al guardar.');
                    }
                }
            } else {
                Error('Error al guardar.');
            }
            header('Location: /modules/students');
            exit();
        }
    }
}






# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠