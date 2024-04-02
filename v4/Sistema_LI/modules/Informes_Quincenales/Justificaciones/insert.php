<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";
if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
				$_SESSION['name_user'] = $row['name'];
    }
}


$archivopdf = $_FILES["archivo"]["name"]; 
$sql = "SELECT archivopdf FROM justificaciones";
$resultado = $conexion->query($sql); 
$row = mysqli_fetch_array($result);
$_SESSION['send_archivo']=$row['archivopdf'];

$nombrePDF=$_SESSION['send_archivo'];
    if ($nombrePDF==$archivopdf) {
        Info('Ya existe un archivo con el nombre.');
        header('Location: /modules/Justificaciones');
        exit();
    } else {

  $usuario = $_POST['userid'];
	$numeroDePDF = $_POST['num'];
	$descripcion = $_POST['descripcion'];
	$date = date('Y-m-d H:i:s');
	$status="En revisión";
	$mensaje="Sin comentarios";
	$evidencia="";
	$name_not=$_SESSION['name_user'];
	$status_not="revisar";
	$mensaje_not="ha subido a Envió 1 el documento: ";
	$mensage_estudiante="Sin comentarios";



	$sql_not="INSERT INTO notify (user, name, mensaje, nombrepdf, estado) VALUES ('$usuario','$name_not','$mensaje_not','$archivopdf','$status_not')";
	$result_not = $conexion->query($sql_not);

	$sql = "INSERT INTO justificaciones (user, num, archivopdf, descripcion, created_at, updated_at,estado,message,evidencepdf,message_student ) VALUES ('$usuario', '$numeroDePDF', '$archivopdf', '$descripcion', '$date', '$date', '$status', '$mensaje','$evidencia','$mensage_estudiante')";
	$resultado = $conexion->query($sql);
    $id = $_SESSION["user_id"];
    echo "Mi id es: " . $id;

	if($_FILES["archivo"]["error"]>0){     
		Info ("Error al cargar el archivo");
	}else{
		$permitidos= array("application/pdf"); 
		$limite_kb=5000;
		if(in_array($_FILES["archivo"]["type"],$permitidos) && $_FILES["archivo"]["size"]<=$limite_kb*1024){
			$ruta = 'justificacionespdf/'. $id . '/';
			$archivo=$ruta . $_FILES["archivo"]["name"];
			if(!file_exists($ruta)){
				mkdir($ruta);
			}
			if(!file_exists($archivo)){
				$resultado=@move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);
				if($resultado){

                    Info ("Archivo guardado correctamente");
				}else{
                    
                    Info ("Error al guardar el archivo");
				}

			}else{

                Info ("El archivo ya existe");
			}
		}else{

			Info ("Archivo no permitido, excede el tamaño");
		}
	}

       
        
        header('Location: /modules/Justificaciones');
        exit();
}


?>

