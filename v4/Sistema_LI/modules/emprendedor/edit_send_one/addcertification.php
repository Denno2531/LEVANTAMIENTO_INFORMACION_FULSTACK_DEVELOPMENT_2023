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
        echo "Error al cargar el archivo";
    } else {
        $permitidos = array("application/pdf");
        $limite_kb = 5000;

        // Verificar tipo y tamaño del archivo
        if (in_array($archivo["type"], $permitidos) && $archivo["size"] <= $limite_kb * 1024) {
            $user_id = $_POST['user_id'];
            $numeroDePDF = $_POST['num'];
            $descripcion = $_POST['descripcion'];
            $date = date('Y-m-d H:i:s');
            $mensaje="Sin comentarios";
            $evidencia = "";
            
            $archivopdf = mysqli_real_escape_string($conexion, $archivo["name"]);
            
            // Guardar información en la base de datos
            //$archivo_destino = 'certificadopdf/' . $_POST["user_id"] . '/' . $archivo["name"];
            
            $sql = "INSERT INTO certification (user, num, archivopdf, descripcion, created_at, updated_at, message, evidencepdf) VALUES ('$user_id', '$numeroDePDF', '$archivopdf', '$descripcion', '$date', '$date', '$mensaje', '$evidencia')";
            // $resultado = $conexion->query($sql);

            if($conexion->query($sql) === TRUE) {
                $ruta = '../certification/certificadopdf/'. $_POST["user_id"] . '/';
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }
                
                $archivo_destino = $ruta . $archivopdf;
                if (move_uploaded_file($archivo["tmp_name"], $archivo_destino)){
                    info (" Archivo guardado correctamente");
                }else{
                    Error ("Error al guardar el archivo");
                }
            }else {
            info ("Error al insertar en la base de datos (certification): " . $conexion->error);
            }
    
        } else {
            info ("Archivo no permitido o excede el tamaño");
        }
    }
} else {
    info ("No se ha enviado ningún archivo");
}

// Redireccionar a la página de certificación
header('Location: /modules/edit_send_one');
exit();


// Cuando escribi este codigo lo entendiamos Dios y yo, ahora solo dios
?>