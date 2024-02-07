<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

// Directorio que deseas limpiar
$directorio = '../certification/certificadopdf/';

// Verificar si el directorio existe y es accesible
if (is_dir($directorio) && is_writable($directorio)) {
    // Abrir el directorio
    if ($handle = opendir($directorio)) {
        // Recorrer los archivos en el directorio
        while (($archivo = readdir($handle)) !== false) {
            // Excluir los directorios especiales . y ..
            if ($archivo != "." && $archivo != "..") {
                // Eliminar el archivo
                unlink($directorio . $archivo);
            }
        }
        // Cerrar el directorio
        closedir($handle);
        echo "Todos los archivos fueron eliminados del directorio.";
    } else {
        echo "No se pudo abrir el directorio.";
    }
} else {
    echo "El directorio no existe o no es accesible para escritura.";
}
?>
<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter"> Certificado  </h2>
        <?php 
            echo '<h2 class="textList"> ' . $_POST['txtname'] . ' </h2>';
            if ($result && $result->num_rows > 0) {
                echo '<tr>
                        <th class="center" style="width: 800px">Nombre del archivo</th> 
                        <th class="center" style="width: 300px">Creado</th>
                        <th class="center" style="width: 300px">Actualizado</th>
                        <th class="center">Descargar</th>
                        <th class="center">Editar</th>
                      </tr>';
        

            $path = '../certification/certificadopdf/' . $_POST["txtuserid"];
            if(file_exists($path)){
                $directorio = opendir($path);
                while($archivo = readdir($directorio)){
                    if(!is_dir($archivo)){
                        echo '
                            <tr>
                                <td>' . $archivo . '</td>
                                <td>' . $_SESSION["send_created"] . '</td>
                                <td>' . $_SESSION["send_updated"] . '</td>
                                <td> 
                                    <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
                                    title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
                                    name="btn" value="form_consult" type="submit"></button>
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        <input style="display:none;" type="text" name="txtuserid" value="'.$archivo.'"/>
                                        <button class="btnedit" name="btn" value="form_update" type="submit"></button>
                                    </form>
                                </td>													
                            </tr>';  
                            $i += 1;       
                    }
                }
            }
            }
        ?>
    </table>
    <br></br>
</div>

<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options-disabled.php";
	?>
</div>


<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options-disabled.php";
	?>
</div>