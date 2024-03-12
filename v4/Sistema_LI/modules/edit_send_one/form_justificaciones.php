<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$max = 10;

if (!empty($_POST['search'])) {
    $search = mysqli_real_escape_string($conexion, $_POST['search']);
    
    // Consulta SQL para buscar el término en varias columnas
    $sql = "SELECT * FROM justificaciones WHERE num LIKE '%$search%' OR archivo LIKE '%$search%' OR user LIKE '%$search%' OR descripcion LIKE '%$search%' ORDER BY num";
    
    $_result = mysqli_query($conexion, $sql);
    
    $_SESSION['justificaciones_data'] = [];
    
    // Almacenar los resultados en el arreglo de sesión
    while ($row = mysqli_fetch_array($_result)) {
        $_SESSION['justificaciones_data'][] = $row;
    }
    
    $_SESSION['total_justificaciones'] = count($_SESSION['justificaciones_data']);
} elseif (!empty($_POST['txtuserid'])) {
    $userid = mysqli_real_escape_string($conexion, $_POST['txtuserid']);
    
    // Consulta SQL
    $sql = "SELECT * FROM justificaciones WHERE user='$userid' ORDER BY num LIMIT $max";
    
    $_result = mysqli_query($conexion, $sql);
    
    $_SESSION['justificaciones_data'] = []; // Array para almacenar los datos de las justificaciones encontradas
    
    // Almacenar los resultados en el arreglo de sesión
    while ($row = mysqli_fetch_array($_result)) {
        $_SESSION['justificaciones_data'][] = $row;
    }
    
    $_SESSION['total_justificaciones'] = count($_SESSION['justificaciones_data']);
}
?>

<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter">Justificaciones</h2>
        <?php
        echo '<h2 class="textList">' . $_POST['txtname'] . '</h2>';
        ?>
        <?php
        if ($_SESSION['total_justificaciones'] != 0) {
            
            echo '
                <tr>
                    <th class="center" style="width: 800px">Nombre del archivo</th>
                    <th class="center" style="width: 70px">Estado</th>
                    <th class="center" style="width: 300px">Creado</th>
                    <th class="center" style="width: 300px">Actualizado</th>
                    
                    <th class="center"><a class="icon">download</a></th>
                    <th class="center"><a class="icon">edit</a></th>
                </tr>';
                    
            foreach ($_SESSION['justificaciones_data'] as $row) {
                $path = '../Justificaciones/justificacionespdf/' . $row['user'];
                $archivo = $row['archivopdf'];
                echo '
                    <tr>
                        <td>' . $archivo . '</td>
                        <td>' . $row['estado'] . '</td>
                        <td>' . $row['created_at'] . '</td>
                        <td>' . $row['updated_at'] . '</td>
                        <td>
                            <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
                                title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
                                name="btn" value="form_consult" type="submit"></button></td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <input style="display:none;" type="text" name="txtevidencefile" value="' . $_SESSION['evidencia'] . '"/>
                                <button class="btnedit" name="btn" value="form_updatejustificacion" type="submit"></button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <input style="display:none;" type="text" name="txtevidencefile" value="' . $_SESSION['evidencia'] . '"/>
                                <button class="btndelete" name="btn" value="form_delete" type="submit"></button>
                            </form>
                        </td>
                    </tr>';       
            }
        }
        ?>
    </table>
    <?php
    if ($_SESSION['total_justificaciones'] == 0) {
        echo '<img src="/images/404.svg" class="data-not-found" alt="404">';
    }
    ?>
</div>

<div class="content-aside">
    <?php
    include_once '../notif_info.php';
    include_once "../sections/options-disabled.php";
    ?>
</div>
	