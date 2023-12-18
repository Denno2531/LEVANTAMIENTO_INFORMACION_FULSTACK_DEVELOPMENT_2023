<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtnum'] = trim($_POST['txtnum']);

if (empty($_POST['txtnum'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtnum'] == '') {
	Error('Ingrese un ID correcto!!');
	header('Location: /modules/Informes_Quincenales');
	exit();
}


$sql_infoq = "SELECT * FROM infoq WHERE num = '" . $_POST['txtnum'] . "'";


mysqli_begin_transaction($conexion);
try {
    
    if ($result = $conexion->query($sql_infoq)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');

            $sql_update_infoq = "UPDATE infoq SET user = '" . trim($_POST['txtuserid']) . "', description = '" . trim($_POST['txtinfoqdescription']) ."', archivo = '" . trim($_POST['pdf_archivo']). "', updated_at = '" . $date . "' WHERE num = '" . trim($_POST['txtnum']) . "'";

            if (mysqli_query($conexion, $sql_update_infoq)) {
                Info('Archivo actualizado.');
            } else {
                Error('Error al actualizar.');
            }
        } else {
            Error('Este ID de archivo no existe.');
        }
    }

    mysqli_commit($conexion);
} catch (Exception $e) {
    mysqli_rollback($conexion);
    Error('Error al actualizar.');
}

header('Location: /modules/Informes_Quincenales');
exit();
