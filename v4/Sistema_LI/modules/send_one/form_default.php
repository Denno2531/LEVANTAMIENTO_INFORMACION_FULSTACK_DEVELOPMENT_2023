<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT archivopdf, evidencepdf, descripcion FROM send_one";
if ($resultado = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($resultado)) {
        $_SESSION['send_description'] = $row['descripcion'];
      
        $_SESSION['evidencia'] = $row['evidencepdf'];
    }
}

?>
<div class="form-gridview">
    <table class="default">
        <?php
        if ($_SESSION['total_send'] != 0) {
            echo '
                    <tr>
                        <th class="center" style="width: 800px">Nombre del archivo</th>
                        <th class="center" style="width: 70px">Descripción</th>
                        <th class="center"><a class="icon">download</a></th>
                        <th class="center"><a class="icon">visibility</a></th>
                        <th class="center"><a class="icon">delete</a></th>
                    </tr>
            ';
        }
        $path = 'sendonepdf/' . $_SESSION["user"];
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo '
                    <tr>
                        <td>' . $archivo . '</td>
                        <td>' . $_SESSION["send_description"] . '</td>    
                        <td> 
                            <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
                            title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
                            name="btn" value="form_consult" type="submit"></button></td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <input style="display:none;" type="text" name="txtevidencefile" value="' . $_SESSION['evidencia'] . '"/>
                                <button class="btnedit" name="btn" value="form_view" type="submit"></button>
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
        }
        ?>
    </table>
    <?php
    if ($_SESSION['total_send'] == 0) {
        echo '
                <img src="/images/404.svg" class="data-not-found" alt="404">
        ';
    }
    if ($_SESSION['total_send'] != 0) {
        echo '
                <div class="pages">
                    <ul>
        ';
        for ($n = 1; $n <= $tpages; $n++) {
            if ($page == $n) {
                echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
            } else {
                echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
            }
        }
        echo '
                    </ul>
                </div>
        ';
    }
    ?>
</div>
<div class="content-aside">
    <?php
    include_once '../notif_info.php';
    include_once "../sections/options-disabled.php";
    ?>
</div>
