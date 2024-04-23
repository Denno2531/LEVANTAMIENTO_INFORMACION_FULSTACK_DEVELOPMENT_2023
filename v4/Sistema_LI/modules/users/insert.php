<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

// Se eliminan las líneas que modifican directamente $_POST['txtuserid'] y $_POST['txtpass']
// para evitar problemas de seguridad y mantener los datos originales para cualquier posterior validación.

// Se valida si el campo txtuserid está vacío.
if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}

// Se elimina la comprobación redundante de txtuserid igual a cadena vacía.

// Se escapa la contraseña antes de hacer hash.
$passhash = hash("SHA256", mysqli_real_escape_string($conexion, trim($_POST['txtpass'])));

// Verificar si ya existe otro usuario con el mismo correo electronico
$sql_check_email = "SELECT * FROM users WHERE email = ? AND user != ?";
$stmt_check_email = $conexion->prepare($sql_check_email);
$stmt_check_email->bind_param("ss", trim($_POST['txtemail']), $_POST['txtuserid']);
$stmt_check_email->execute();
$result_check_email = $stmt_check_email->get_result();

// Se prepara la consulta SQL utilizando consultas preparadas.
$sql = "SELECT * FROM administratives WHERE user = ?";

if ($stmt = $conexion->prepare($sql)) {
    // Se vincula el parámetro.
    $stmt->bind_param("s", $_POST['txtuserid']);
    // Se ejecuta la consulta.
    $stmt->execute();
    // Se obtiene el resultado.
    $result = $stmt->get_result();
    // Se verifica si se encontraron resultados.
    if ($result->num_rows > 0) {
        Error('Este ID ya está en uso. Elige otro.');
        header('Location: /modules/users');
        exit();
    } elseif ($result_check_email->num_rows > 0) {
            Error('Ya existe otro usuario con el mismo correo electronico.');
            header('Location: /modules/users');
            exit();
    } else {
        // Se obtiene la fecha actual.
        $date = date('Y-m-d H:i:s');
        // Se prepara la consulta de inserción de usuario.
        $sql_insert_user = "INSERT INTO users(user, name, surnames, email, pass, permissions, rol, image, created_at) VALUES(?, ?, ?, ?, ?, 'editor', 'editor', 'user.png', ?)";
        if ($stmt = $conexion->prepare($sql_insert_user)) {
            // Se vinculan los parámetros.
            $stmt->bind_param("ssssss", $_POST['txtuserid'], $_POST['txtname'], $_POST['txtsurnames'], $_POST['txtemail'], $passhash, $date);
            // Se ejecuta la consulta de inserción.
            if ($stmt->execute()) {
                $email = $_POST['txtemail'];
                if (empty($email)) {
                    Info('Error al enviar el correo');
                } else {
                    include_once '../email/mail.php';
                    Info('Exito al guardar, Correo enviado correctamente.');
                }
            } else {
                Error('Error al guardar.');
            }
        } else {
            Error('Error al preparar la consulta de inserción.');
        }
        header('Location: /modules/users');
        exit();
    }
} else {
    Error('Error al preparar la consulta.');
}
?>


# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠