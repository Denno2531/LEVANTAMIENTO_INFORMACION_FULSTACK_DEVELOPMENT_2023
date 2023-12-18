<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
    }
}


$archivopdf = $_FILES["archivo"]["name"]; 


$sql = "SELECT archivopdf FROM infoq";  
$result = $conexion->query($sql); 
$row = mysqli_fetch_array($result);
$_SESSION['infoq_archivo']=$row['archivopdf'];
$nombrePDF=$_SESSION['infoq_archivo'];
    if ($nombrePDF==$archivopdf) {
        Info('Ya existe un archivo con el nombre.');
        header('Location: /modules/Informes_Quincenales');
        exit();
    } else {


    $usuario = $_POST['userid'];
	$numeroDePDF = $_POST['num'];
	$descripcion = $_POST['descripcion'];
	$date = date('Y-m-d H:i:s');
	
	
	$sql = "INSERT INTO infoq (user, num, archivopdf, descripcion, created_at, updated_at) VALUES ('$usuario', '$numeroDePDF', '$archivopdf', '$descripcion', '$date', '$date')";
	$resultado = $conexion->query($sql);
    $id = $_SESSION["user_id"];
    echo "Mi id es: " . $id;

	if($_FILES["archivo"]["error"]>0){     
		
		Info ("Error al cargar el archivo");
	}else{
		$permitidos= array("application/pdf"); //Solo recibe pdf
		$limite_kb=4000;
		if(in_array($_FILES["archivo"]["type"],$permitidos) && $_FILES["archivo"]["size"]<=$limite_kb*1024){
			$ruta = 'informesquincenalespdf/'. $id . '/'; 
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
        header('Location: /modules/Informes_Quincenales');
        exit();
}

?>
