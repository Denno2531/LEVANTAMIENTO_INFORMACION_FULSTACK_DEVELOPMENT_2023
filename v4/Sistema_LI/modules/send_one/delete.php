<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$nombreArchivo = $_POST['txtuserid'];
$nombreArchivoEvidencia = $_POST['txtevidencefile'];
if(empty($nombreArchivoEvidencia)){
    $sql= "SELECT evidencepdf FROM send_one WHERE archivopdf = '" . $nombreArchivo . "'";
    $result = $conexion->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $nombreArchivoEvidencia = $row["evidencepdf"];
    }
}

if (!empty($_POST['txtuserid'])) {

    //Elimina de la base
    $sql_delete = "DELETE FROM send_one WHERE archivopdf = '" . $nombreArchivo . "'";
    //Verifica si se borro
    if (mysqli_query($conexion, $sql_delete)) {
        Info('Entrada eliminada de la base de datos.');
    } else {
        Error('Error al eliminar la entrada de la base de datos.');
    }
    //Contruye la ruta del repo del usuario students
    $rutaArchivo = 'sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivo;

    //Verifica si el archivo existe y borra 
    if (file_exists($rutaArchivo) && unlink($rutaArchivo)) {
        Info('Archivo del usuario eliminado.');
    } else {
        Error('No se pudo eliminar el archivo de evidencia en la ruta: ' . $rutaArchivo);
    }
}

    //Borra archivo y registro del editor
    if (!empty($nombreArchivoEvidencia)) {
        //Contruye la ruta del repo del usuario editor
        $rutaArchivoEvidencia = '../edit_send_one/sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivoEvidencia;
        if (file_exists($rutaArchivoEvidencia) && unlink($rutaArchivoEvidencia)) {
            Info('Archivo del usuario eliminado.');
        } else {
            Error('No se pudo eliminar el archivo de evidencia en la ruta: ' . $rutaArchivoEvidencia);
        }
    }

header('Location: /modules/send_one');
exit();
?>
