<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT archivopdf, evidencepdf, descripcion FROM certification";
if ($resultado = $conexion->query($sql)) {
    $_SESSION['certificados'] = [];
    while ($row = mysqli_fetch_array($resultado)) {
        $_SESSION['certificados'][] = [
            'descripcion' => $row['descripcion'],
            'evidencia' => $row['evidencepdf']
        ];
    }
}

?>
<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter"> Certificado  </h2>

        <?php
        if (!empty($_SESSION['certificados'])) {
            echo '
                    <tr>
                        <th class="center" style="width: 800px">Nombre del archivo</th>
                        <th class="center" style="width: 70px">Descripción</th>
                        <th class="center"><a class="icon">download</a></th>
                        <th class="center"><a class="icon">visibility</a></th>
                        <th class="center"><a class="icon">delete</a></th>
                    </tr>
            ';

            $path = 'certificadopdf/' . $_SESSION["user"];
            if (file_exists($path)) {
                $directorio = opendir($path);
                while (($archivo = readdir($directorio)) && !feof($directorio)) {
                    if (!is_dir($archivo)) {
                        echo '
                        <tr>
                            <td>' . $archivo . '</td>
                            <td>' . $_SESSION['certificados'][$archivo]['descripcion'] . '</td>   
                            <td>
                                <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '\"
                                title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview"
                                name="btn" value="form_consult" type="submit"></button></td>
                            <td>
                                <form action="" method="POST">
                                    <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                    <input style="display:none;" type="text" name="txtevidencefile" value="' . $_SESSION['certificados'][$archivo]['evidencia'] . '"/>
                                    <button class="btnedit" name="btn" value="form_view" type="submit"></button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                    <input style="display:none;" type="text" name="txtevidencefile" value="' . $_SESSION['certificados'][$archivo]['evidencia'] . '"/>
                                    <button class="btndelete" name="btn" value="from_delete" type="submit"></button>
                                </form>
                            </td>
                        </tr>
                        ';
                    }
                }
                closedir($directorio);
            }
        } else {
            echo '<tr><td colspan="5">No se encontraron certificados.</td></tr>';
        }
        ?>
    </table>
</div>

<div class="content-aside">
    <?php
    include_once '../notif_info.php';
    include_once "../sections/options-disabled.php";
    ?>
</div>