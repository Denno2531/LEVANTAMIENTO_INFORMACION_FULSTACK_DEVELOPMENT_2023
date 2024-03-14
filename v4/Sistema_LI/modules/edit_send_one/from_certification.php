<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

// Debes definir el valor de $max antes de usarlo en el cálculo de $tpages
$max = 10; // Aquí debes proporcionar el valor apropiado

if (!empty($_POST['search'])) {
    // Código para la búsqueda
} elseif (!empty($_POST['txtuserid'])) {
    $userid = mysqli_real_escape_string($conexion, $_POST['txtuserid']);
    
    // Consulta SQL para obtener los certificados del usuario específico
    $sql = "SELECT * FROM certification WHERE user='$userid' ORDER BY num LIMIT $max";

    $result = mysqli_query($conexion, $sql);

    $_SESSION['certification_data'] = []; // Arreglo para almacenar los datos de los certificados encontrados
    
    // Almacenar los resultados en el arreglo de sesión
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['certification_data'][] = $row;
    }

    $_SESSION['total_certification'] = count($_SESSION['certification_data']);
}

?>

<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter">Certificados</h2>
        <?php
        echo '<h2 class="textList"> ' . $_POST['txtname'] . ' </h2>'
        ?>
        <?php
        if ($_SESSION['total_certification'] != 0) {
            echo '
                <tr>
                    <th class="center" style="width: 800px">Nombre del archivo</th>
                    <th class="center" style="width: 300px">Creado</th>
                    <th class="center" style="width: 300px">Actualizado</th>
                    <th class="center">Descargar</th>
                    <th class="center">Editar</th>
                </tr>';

            foreach ($_SESSION['certification_data'] as $row) {
                $path = '../certification/certificadopdf/' . $row['user'];
                $archivo = $row['archivopdf'];
                echo '
                    <tr>
                        <td>' . $archivo . '</td>
                        <td>' . $row['created_at'] . '</td>
                        <td>' . $row['updated_at'] . '</td>
                        <td> 
                            <div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
                            title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
                            name="btn" value="form_consult" type="submit"></button>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
                                <button class="btnedit" name="btn" value="form_updatecertification" type="submit"></button>
                            </form>
                        </td>                                                    
                    </tr>';
            }
        }
        ?>
    </table>
    <?php
    if ($_SESSION['total_certification'] == 0) {
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
