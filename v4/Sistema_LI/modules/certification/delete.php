<?php 
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$nombreArchivo = $_POST['txtuserid'];
$nombreArchivoEvidencia = $_POST['txtevidencefile'];

if (empty($nombreArchivo)) {
    Error('No se proporcionó un nombre de archivo para eliminar.');
    header('Location: /modules/certificado');
    exit();
}

// Verificar si el archivo existe y eliminarlo
$rutaArchivo = $_SESSION['raiz'] . '/modules/certificadopdf/' . $_SESSION["user"] . '/' . $nombreArchivo;
if (file_exists($rutaArchivo)) {
    if (unlink($rutaArchivo)) {
        Info('Archivo del usuario eliminado.');
    } else {
        Error('No se pudo eliminar el archivo del usuario.');
    }
} else {
    Error('El archivo no existe en la ruta proporcionada: ' . $rutaArchivo);
}

// Elimina de la base de datos
$sql_delete = "DELETE FROM certification WHERE archivopdf = '" . $nombreArchivo . "'";
if (mysqli_query($conexion, $sql_delete)) {
    Info('Entrada eliminada de la base de datos.');
} else {
    Error('Error al eliminar la entrada de la base de datos.');
}

// Verificar y eliminar archivo de evidencia del editor
if (!empty($nombreArchivoEvidencia)) {
    $rutaArchivoEvidencia = $_SESSION['raiz'] . '/modules/edit_send_one/certificadopdf/' . $_SESSION["user"] . '/' . $nombreArchivoEvidencia;
    if (file_exists($rutaArchivoEvidencia)) {
        if (unlink($rutaArchivoEvidencia)) {
            Info('Archivo de evidencia del editor eliminado.');
        } else {
            Error('No se pudo eliminar el archivo de evidencia del editor.');
        }
    } else {
        Error('El archivo de evidencia del editor no existe en la ruta proporcionada: ' . $rutaArchivoEvidencia);
    }
}

header('Location: /modules/certification');
exit();
