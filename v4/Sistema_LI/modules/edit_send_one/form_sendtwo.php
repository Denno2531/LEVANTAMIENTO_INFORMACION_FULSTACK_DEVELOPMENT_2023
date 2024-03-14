<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$max = 10; // Definir el valor de $max según sea necesario

if (!empty($_POST['search'])) {
    $search = mysqli_real_escape_string($conexion, $_POST['search']);
    $sql = "SELECT * FROM send_two WHERE num LIKE '%$search%' OR archivo LIKE '%$search%' OR user LIKE '%$search%' OR descripcion LIKE '%$search%' ORDER BY num";
} elseif (!empty($_POST['txtuserid'])) {
    $userid = mysqli_real_escape_string($conexion, $_POST['txtuserid']);
    $sql = "SELECT * FROM send_two WHERE user = '$userid' ORDER BY num";
} else {
    $sql = "SELECT * FROM send_two ORDER BY num";
}

$result = mysqli_query($conexion, $sql);

$_SESSION['sendtwo_data'] = [];

while ($row = mysqli_fetch_array($result)) {
    $_SESSION['sendtwo_data'][] = $row;
}

$_SESSION['total_sendtwo'] = count($_SESSION['sendtwo_data']);
?>

<div class="form-gridview">
    <<<<<<< HEAD <table class="default">
        <h2 class="titlecenter"> Envío 2 </h2>
        <?php
        echo '<h2 class="textList"> ' . $_POST['txtname'] . ' </h2>'
            ?>
        <?php
        if ($_SESSION['total_send'] != 0) {
            echo '
					<tr>
						<th class="center" style="width: 800px">Nombre del archivo</th>
						<th class="center" style="width: 70px">Estado</th>
						<th class="center" style="width: 300px">Creado</th>
						<th class="center" style="width: 300px">Actualizado</th>
				        <th class="center"><a class="icon">download</a></th>
						<th class="center"><a class="icon">edit</a></th>
						
			';
            if ($_SESSION['permissions'] != 'edit') {
                //echo '<th class="center"><a class="icon">delete</a></th>';
            }
            echo '	
					</tr>
			';
        }
        $path = '../send_two/sendtwopdf/' . $_POST["txtuserid"];
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
																<button class="btnedit" name="btn" value="form_updatetwo" type="submit"></button>
															</form>
														</td>													
													</tr>';
                }
            }
        }
        ?>
        </table>
        <br></br>


        =======
        <table class="default">
            <h2 class="titlecenter">Envío 2</h2>
            <?php if ($_SESSION['total_sendtwo'] != 0): ?>
                <tr>
                    <th class="center" style="width: 800px">Nombre del archivo</th>
                    <th class="center" style="width: 70px">Estado</th>
                    <th class="center" style="width: 300px">Creado</th>
                    <th class="center" style="width: 300px">Actualizado</th>
                    <th class="center"><a class="icon">download</a></th>
                    <th class="center"><a class="icon">edit</a></th>
                </tr>
                <?php foreach ($_SESSION['sendtwo_data'] as $row): ?>
                    <?php
                    $path = '../send_two/sendtwopdf/' . $row['user'];
                    $archivo = $row['archivopdf'];
                    ?>
                    <tr>
                        <td style="word-break: break-all;">
                            <?= $archivo ?>
                        </td>
                        <td>
                            <?= $row['estado'] ?>
                        </td>
                        <td>
                            <?= $row['created_at'] ?>
                        </td>
                        <td>
                            <?= $row['updated_at'] ?>
                        </td>
                        <td>
                            <div data="<?= $path . '/' . $archivo ?>">
                                <a href="<?= $path . '/' . $archivo ?>" title="Ver archivo adjunto" class="btnview"
                                    target="_blank">
                                    <button class="btnview" name="btn" value="form_consult" type="submit"></button>
                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input style="display:none;" type="text" name="txtuserid" value="<?= $archivo ?>" />
                                <button class="btnedit" name="btn" value="form_updatetwo" type="submit"></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <?php
        if ($_SESSION['total_sendtwo'] == 0) {
            echo '<img src="/images/404.svg" class="data-not-found" alt="404">';
        }
        ?>
        >>>>>>> eaaa37ee81529b37604417b9ae9d252b86640a15
</div>

<div class="content-aside">
    <?php
    include_once '../notif_info.php';
    include_once "../sections/options-disabled.php";
    ?>
</div>