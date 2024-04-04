<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

// Validar que el ID de usuario no esté vacío
if (isset($_POST['txtuserid'])) {
    $_POST['txtuserid'] = trim($_POST['txtuserid']);
    if (empty($_POST['txtuserid'])) {
        Error('Error: No se proporcionó un ID de usuario.');
        header('Location: /modules/users');
        exit();
    }
} else {
    Error('No se recibió un ID de usuario.');
    header('Location: /modules/users');
    exit();
}

// Consulta preparada para evitar inyección de SQL
$sql_user = "SELECT * FROM users WHERE user = ?";
$stmt = $conexion->prepare($sql_user);
$stmt->bind_param("s", $_POST['txtuserid']);
$stmt->execute();
$result = $stmt->get_result();

mysqli_begin_transaction($conexion);
try {
    if ($row = $result->fetch_assoc()) {
        $date = date('Y-m-d H:i:s');
        if (empty($_POST['txtpassupdate'])) {
            $sql_update_user = "UPDATE users SET name = ?, surnames = ?, email = ?, permissions = ?, rol = ?, updated_at = ? WHERE user = ?";
            $stmt = $conexion->prepare($sql_update_user);
            $stmt->bind_param("sssssss", trim($_POST['txtnameupdate']), trim($_POST['txtsurnameupdate']), trim($_POST['txtemailupdate']), trim($_POST['txtusertype']), trim($_POST['txtuserrol']), $date, $_POST['txtuserid']);
            $stmt->execute();
        } else {
            $passhash = hash("SHA256", trim($_POST['txtpassupdate']));
            $sql_update_user = "UPDATE users SET name = ?, surnames = ?, email = ?, pass = ?, permissions = ?, rol = ?, updated_at = ? WHERE user = ?";
            $stmt = $conexion->prepare($sql_update_user);
            $stmt->bind_param("ssssssss", trim($_POST['txtnameupdate']), trim($_POST['txtsurnameupdate']), trim($_POST['txtemailupdate']), $passhash, trim($_POST['txtusertype']), trim($_POST['txtuserrol']), $date, $_POST['txtuserid']);
            $stmt->execute();
        }

        if (!$stmt->execute()) {
            handleError('Error!!! al actualizar el usuario: ' . $stmt->error);
        }

        if ($stmt->affected_rows > 0) {
            Info('Usuario actualizado.');
        } else {
            Error('No se realizaron cambios en el usuario.');
        }
    } else {
        Error('Este ID de usuario no existe.');
    }

    mysqli_commit($conexion);
} catch (Exception $e) {
    mysqli_rollback($conexion);
    Error('Error al actualizar el usuario:' . $e->getMessage());
}

header('Location: /modules/users');
exit();

// Cuando escribi este codigo lo entendiamos Dios y yo, ahora solo Dios.
?>
