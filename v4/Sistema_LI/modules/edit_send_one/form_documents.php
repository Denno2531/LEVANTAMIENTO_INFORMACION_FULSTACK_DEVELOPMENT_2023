<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

// Debes definir el valor de $max antes de usarlo en el cálculo de $tpages
$max = 10; // Aquí debes proporcionar el valor apropiado

if(!empty($_POST['search'])){
	$search = mysqli_real_escape_string($conexion, $_POST['search']);
	$sql = "SELECT * FROM send_one WHERE num LIKE '%$search%' OR archivo LIKE '%$search%' OR user LIKE '%$search%' OR descripcion LIKE '%$search%' ORDER BY num";
	
	$_result = mysqli_query($conexion, $sql);

	$_SESSION['sendone_data'] = [];

	// Almacenar los resultados en el arreglo de sesión
	while ($row = mysqli_fetch_array($_result)){
		$_SESSION['sendone_data'][] = $row;
	}

	$_SESSION['total_sendone'] = count($_SESSION['sendone_data']);

}elseif(!empty($_POST['txtuserid'])){
	$userid = mysqli_real_escape_string($conexion, $_POST['txtuserid']);

	$sql = "SELECT * FROM send_one WHERE user='$userid' ORDER BY num LIMIT $max";

	$_result = mysqli_query($conexion, $sql);

	$_SESSION['sendone_data'] = [];

	while ($row = mysqli_fetch_array($_result)){
		$_SESSION['sendone_data'][] = $row;
	}

	$_SESSION['total_sendone'] = count($_SESSION['sendone_data']);

}

?>
<div class="form-gridview">
    <table class="default">
        <h2 class="titlecenter">Envío 1</h2>
        <?php if ($_SESSION['total_sendone'] != 0) : ?>
            <tr>
                <th class="center" style="width: 800px">Nombre del archivo</th>
                <th class="center" style="width: 70px">Estado</th>
                <th class="center" style="width: 300px">Creado</th>
                <th class="center" style="width: 300px">Actualizado</th>
                <th class="center"><a class="icon">download</a></th>
                <th class="center"><a class="icon">edit</a></th>
            </tr>
            <?php foreach ($_SESSION['sendone_data'] as $row) : ?>
                <?php
                $path = '../send_one/sendonepdf/' . $row['user'];
                $archivo = $row['archivopdf'];
                ?>
                <tr>
                    <td style="word-break: break-all;"><?= $archivo ?></td>
                    <td><?= $row['estado'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td><?= $row['updated_at'] ?></td>
                    <td>
                        <div data="<?= $path . '/' . $archivo ?>">
                            <a href="<?= $path . '/' . $archivo ?>" title="Ver archivo adjunto" class="btnview" target="_blank">
                                <button class="btnview" name="btn" value="form_consult" type="submit"></button>
                            </a>
                        </div>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input style="display:none;" type="text" name="txtuserid" value="<?= $archivo ?>" />
                            <button class="btnedit" name="btn" value="form_update" type="submit"></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <?php
    if ($_SESSION['total_sendone'] == 0) {
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
