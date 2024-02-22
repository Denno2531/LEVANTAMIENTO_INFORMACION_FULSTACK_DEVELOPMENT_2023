<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

// Verificar si se ha enviado un archivo
if (isset($_FILES["archivo"])) {
    $archivo = $_FILES["archivo"];

    // Verificar si hay un archivo válido
    if ($archivo["error"] > 0) {
        Info("Error al cargar el archivo");
    } else {
        $permitidos = array("application/pdf");
        $limite_kb = 5000;

        // Verificar tipo y tamaño del archivo
        if (in_array($archivo["type"], $permitidos) && $archivo["size"] <= $limite_kb * 1024) {
            $usuario = $_POST['userid'];
            $numeroDePDF = $_POST['num'];
            $descripcion = $_POST['descripcion'];
            $date = date('Y-m-d H:i:s');
            $status = "En revisión";
            $mensaje = "Sin comentarios";
            $evidencia = "";
            $name_not = $_SESSION['name_user'];
            $status_not = "revisar";
            $mensaje_not = "ha subido a Certificado el documento: ";
            $mensage_estudiante = "Sin comentarios";

            // Insertar notificación
            $sql_not = "INSERT INTO notify (user, name, mensaje, nombrepdf, estado) VALUES ('$usuario','$name_not','$mensaje_not','$archivopdf','$status_not')";
            $result_not = $conexion->query($sql_not);

            // Guardar información en la base de datos
            $archivo_destino = 'certificadopdf/' . $_SESSION["user_id"] . '/' . $archivo["name"];
            $sql = "INSERT INTO certification (user, num, archivopdf, descripcion, created_at, updated_at, message, evidencepdf) VALUES ('$usuario', '$numeroDePDF', '$archivo_destino', '$descripcion', '$date', '$date', '$mensaje','$evidencia')";
            $resultado = $conexion->query($sql);

            // Crear directorio si no existe
            $ruta = 'certificadopdf/' . $_SESSION["user_id"] . '/';
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            // Mover el archivo al directorio
            if (move_uploaded_file($archivo["tmp_name"], $archivo_destino)) {
                Info("Archivo guardado correctamente");
            } else {
                Info("Error al guardar el archivo");
            }
        } else {
            Info("Archivo no permitido o excede el tamaño");
        }
    }
} else {
    Info("No se ha enviado ningún archivo");
}

// Redireccionar a la página de certificación
header('Location: /modules/certification');
exit();
?>
