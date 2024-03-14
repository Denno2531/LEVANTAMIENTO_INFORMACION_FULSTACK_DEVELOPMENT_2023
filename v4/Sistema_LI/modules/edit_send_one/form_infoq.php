<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

// Debes definir el valor de $max antes de usarlo en el cálculo de $tpages
$max = 10; // Aquí debes proporcionar el valor apropiado

// Verificar si se ha enviado un término de búsqueda
if (!empty($_POST['search'])) {
    $search = mysqli_real_escape_string($conexion, $_POST['search']);
    
    // Consulta SQL para buscar el término en varias columnas
    $sql = "SELECT * FROM infoq WHERE num LIKE '%$search%' OR archivo LIKE '%$search%' OR user LIKE '%$search%' OR description LIKE '%$search%' ORDER BY num";

    $result = mysqli_query($conexion, $sql);

    $_SESSION['infoq_data'] = [];
    
    // Almacenar los resultados en el arreglo de sesión
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['infoq_data'][] = $row;
    }

    $_SESSION['total_infoq'] = count($_SESSION['infoq_data']);
} elseif (!empty($_POST['txtuserid'])) {
    $userid = mysqli_real_escape_string($conexion, $_POST['txtuserid']);
    
     // Consulta SQL para obtener los informes del usuario específico
    $sql = "SELECT * FROM infoq WHERE user='$userid' ORDER BY num LIMIT $max";

    $result = mysqli_query($conexion, $sql);

    $_SESSION['infoq_data'] = []; // Arreglo para almacenar los datos de los informes encontrados
    
    // Almacenar los resultados en el arreglo de sesión
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['infoq_data'][] = $row;
    }

    $_SESSION['total_infoq'] = count($_SESSION['infoq_data']);
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

            foreach ($_SESSION['infoq_data'] as $row) {
                $path = '../Informes_Quincenales/informesquincenalespdf/' . $row['user'];
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
