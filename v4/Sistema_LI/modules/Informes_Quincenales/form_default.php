<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

// Consulta SQL para obtener los archivos del estudiante
$sql = "SELECT archivopdf, descripcion, estado FROM infoq WHERE user = '{$_SESSION['user']}'";
$resultado = $conexion->query($sql);

// Almacenar los datos de los archivos en la sesión
$_SESSION['infoq_data'] = [];
while ($row = mysqli_fetch_array($resultado)) {
    $_SESSION['infoq_data'][] = $row;
}

?>

<div class="form-gridview">
    <table class="default">
        <?php
        if ($_SESSION['total_infoq'] != 0) {
            echo '
                    <tr>
                        <th class="center" style="width: 800px">Nombre del archivo</th>
                        <th class="center" style="width: 100 px">Estado</th>
                        <th class="center" style="width: 70px">Descripción</th>
                        <th class="center"><a class="icon">download</a></th>
                        <th class="center"><a class="icon">visibility</a></th>
                        <th class="center"><a class="icon">delete</a></th>
                    </tr>
            ';
        }

        // Iterar sobre los archivos del estudiante y mostrarlos en la tabla
        foreach ($_SESSION['infoq_data'] as $row) {
            $archivo = $row['archivopdf'];
            $estado = $row['estado'];
            $descripcion = $row['descripcion'];
            $evidencia = $row['evidencepdf'];
            $path = 'informesquincenalespdf/' . $_SESSION["user"];
            
            echo '
                    <tr>
                        <td>' . $archivo . '</td>
                        <td>' . $estado . '</td>
                        <td>' . $descripcion . '</td>    
                        <td> 
                            <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
                            title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
                            name="btn" value="form_consult" type="submit"></button></td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <input style="display:none;" type="text" name="txtevidencefile" value="' . $evidencia . '"/>
                                <button class="btnedit" name="btn" value="form_view" type="submit"></button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <input style="display:none;" type="text" name="txtevidencefile" value="' . $evidencia . '"/>
                                <button class="btndelete" name="btn" value="form_delete" type="submit"></button>
                            </form>
                        </td>
                    </tr>';
        }
        ?>
    </table>
    <?php
    if ($_SESSION['total_infoq'] == 0) {
        echo '
                <img src="/images/404.svg" class="data-not-found" alt="404">
        ';
    }
    ?>
    </br>
</div>
<div class="content-aside">
    <?php
    include_once '../notif_info.php';
    include_once "../sections/options-disabled.php";
    ?>
</div>
