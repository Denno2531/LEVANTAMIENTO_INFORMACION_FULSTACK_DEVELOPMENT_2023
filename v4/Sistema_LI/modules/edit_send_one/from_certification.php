<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

// Inicializar las variables de sesión
$_SESSION['num'] = array();
$_SESSION['send_archivo'] = array();
$_SESSION['send_created'] = array();
$_SESSION['send_updated'] = array();

$sql = "SELECT * FROM certification";

if ($result = $conexion->query($sql)) {
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Almacenar los datos en las variables de sesión
            $_SESSION['num'][] = $row['num'];
            $_SESSION['send_archivo'][] = $row['archivopdf'];
            $_SESSION['send_created'][] = $row['created_at'];
            $_SESSION['send_updated'][] = $row['updated_at'];
        }
    }
}

?>
<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter">Certificado</h2>
        <?php 
        echo '<h2 class="textList">' . $_POST['txtname'] . '</h2>';
        
        // Verificar si hay archivos obtenidos de la base de datos
        if (!empty($_SESSION['num'])) {
            echo '<tr>
                    <th class="center" style="width: 800px">Nombre del archivo</th> 
                    <th class="center" style="width: 300px">Creado</th>
                    <th class="center" style="width: 300px">Actualizado</th>
                    <th class="center">Descargar</th>
                    <th class="center">Editar</th>
                  </tr>';
            
            // Iterar sobre los archivos obtenidos de la base de datos
            for ($i = 0; $i < count($_SESSION['num']); $i++) {
                echo '<tr>
                        <td>' . $_SESSION['send_archivo'][$i] . '</td>
                        <td>' . $_SESSION['send_created'][$i] . '</td>
                        <td>' . $_SESSION['send_updated'][$i] . '</td>
                        <td> 
                            <a href="../certification/certificadopdf/' . $_POST["txtuserid"] . '/' . $_SESSION['send_archivo'][$i] . '" title="Ver archivo adjunto" class="btnview" target="_blank">
                                <button class="btnview" name="btn" value="form_consult" type="submit"></button>
                            </a>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="'.$_SESSION['send_archivo'][$i].'"/>
                                <button class="btnedit" name="btn" value="form_update" type="submit"></button>
                            </form>
                        </td>													
                      </tr>';  
            }
        } else {
            echo '<tr><td colspan="5">No se encontraron archivos.</td></tr>';
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