<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

// Verificar si el campo txtuserid está vacío.
if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}

// Consulta para eliminar el usuario de la tabla "users".
$sql_delete_user = "DELETE FROM users WHERE user = ?";
// Consulta para eliminar el usuario de la tabla "administratives".
$sql_delete_admin = "DELETE FROM administratives WHERE user = ?";

// Preparar la consulta para eliminar el usuario de la tabla "users".
if ($stmt = $conexion->prepare($sql_delete_user)) {
    // Vincular el parámetro.
    $stmt->bind_param("s", $_POST['txtuserid']);
    // Ejecutar la consulta para eliminar el usuario de la tabla "users".
    if ($stmt->execute()) {
        // Preparar la consulta para eliminar el usuario de la tabla "administratives".
        if ($stmt = $conexion->prepare($sql_delete_admin)) {
            // Vincular el parámetro.
            $stmt->bind_param("s", $_POST['txtuserid']);
            // Ejecutar la consulta para eliminar el usuario de la tabla "administratives".
            if ($stmt->execute()) {
                // Si ambos borrados fueron exitosos, mostrar mensaje de éxito.
                Info('Personal editor eliminado correctamente.');
            } else {
                // Si falla la eliminación en la tabla "administratives", mostrar mensaje de error.
                Error('Error al eliminar personal editor.');
            }
        } else {
            // Si falla la preparación de la consulta para la tabla "administratives", mostrar mensaje de error.
            Error('Error al preparar la consulta para eliminar personal editor.');
        }
    } else {
        // Si falla la eliminación en la tabla "users", mostrar mensaje de error.
        Error('Error al eliminar personal editor.');
    }
} else {
    // Si falla la preparación de la consulta para la tabla "users", mostrar mensaje de error.
    Error('Error al preparar la consulta para eliminar personal editor.');
}

// Redirigir a la página de usuarios.
header('Location: /modules/users');
exit();
?>

<?php
# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
?>
