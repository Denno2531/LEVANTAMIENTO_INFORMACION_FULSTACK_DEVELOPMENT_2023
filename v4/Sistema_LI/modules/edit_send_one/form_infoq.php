
<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$max = 10;

if (!empty($_POST['search'])) {
    $search = mysqli_real_escape_string($conexion, $_POST['search']);

    $sql = "SELECT * FROM infoq WHERE num LIKE '%$search%' OR archivo LIKE '%$search%' OR user LIKE '%$search%' OR description LIKE '%$search%' ORDER BY num";

    $result = mysqli_query($conexion, $sql);

    $_SESSION['user_id'] = [];
    $_SESSION['num'] = [];
    $_SESSION['justificaciones_archivo'] = [];
    $_SESSION['justificaciones_description'] = [];
    $_SESSION['send_estado'] = [];
    $_SESSION['send_created'] = [];
    $_SESSION['send_updated'] = [];

    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'][] = $row['user'];
        $_SESSION['num'][] = $row['num'];
        $_SESSION['justificaciones_archivo'][] = $row['archivopdf'];
        $_SESSION['justificaciones_description'][] = $row['descripcion'];
        $_SESSION['send_estado'][] = $row['estado'];
        $_SESSION['send_created'][] = $row['created_at'];
        $_SESSION['send_updated'][] = $row['updated_at'];
    }

    $_SESSION['total_infoq'] = count($_SESSION['num']);
} elseif (!empty($_POST['txtuserid'])) {
    $userid = mysqli_real_escape_string($conexion, $_POST['txtuserid']);

    $sql = "SELECT * FROM infoq WHERE user='$userid' ORDER BY num LIMIT $max";

    $result = mysqli_query($conexion, $sql);

    $_SESSION['user_id'] = [];
    $_SESSION['num'] = [];
    $_SESSION['justificaciones_archivo'] = [];

    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'][] = $row['user'];
        $_SESSION['num'][] = $row['num'];
        $_SESSION['justificaciones_archivo'][] = $row['archivopdf'];
    }

    $_SESSION['total_infoq'] = count($_SESSION['num']);
}

?>

<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter"> Informes Quincenales </h2>
        <?php
        echo '<h2 class="textList"> ' . $_POST['txtname'] . ' </h2>'
        ?>
        <?php
        if ($_SESSION['total_infoq'] != 0) {
            echo '
                <tr>
                    <th class="center" style="width: 800px">Nombre del archivo</th>
                    <th class="center" style="width: 70px">Estado</th>
                    <th class="center" style="width: 300px">Creado</th>
                    <th class="center" style="width: 300px">Actualizado</th>
                    <th class="center"><a class="icon">download</a></th>
                    <th class="center"><a class="icon">edit</a></th>';
            if ($_SESSION['permissions'] != 'editor') {
                echo '<th class="center"><a class="icon">delete</a></th>';
            }
            echo '</tr>';
        }

        $path = '../Informes_Quincenales/informesquincenalespdf/' . $_POST["txtuserid"];
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {

                    echo '
                    <tr>
                        <td>' . $archivo . '</td>
                        <td>' . $_SESSION["send_estado"] . '</td>
                        <td>' . $_SESSION["send_created"] . '</td>
                        <td>' . $_SESSION["send_updated"] . '</td>
                        <td> 
                            <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
                            title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
                            name="btn" value="form_consult" type="submit"></button>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <button class="btnedit" name="btn" value="form_updateinfo" type="submit"></button>
                            </form>
                        </td>                                                    
                    </tr>';
                }
            }
        }
        ?>
    </table>
    <?php
    if ($_SESSION['total_infoq'] == 0) {
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