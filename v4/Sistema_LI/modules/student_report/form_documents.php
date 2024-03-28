<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT * FROM send_one";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['send_estado'] = $row['estado'];
		$_SESSION['send_created'] = $row['created_at'];
		$_SESSION['send_updated'] = $row['updated_at'];
	}
}

// Debes definir el valor de $max antes de usarlo en el cálculo de $tpages
$max = 10; // Aquí debes proporcionar el valor apropiado

$sql = "SELECT COUNT(num) AS total FROM send_one";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}
// Aquí debes proporcionar el valor apropiado v2

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_one WHERE num LIKE '%" . $_POST['search'] . "%' OR archivo LIKE '%" . $_POST['search'] . "%' OR user LIKE '%" . $_POST['search'] . "%' OR descripcion LIKE '%" . $_POST['search'] . "%' ORDER BY num";

	if ($result = $conexion->query($sql)) {
		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['send_archivo'][$i] = $row['archivopdf'];
			$_SESSION['send_estado'][$i] = $row['estado'];
			$_SESSION['send_created'][$i] = $row['created_at'];
			$_SESSION['send_updated'][$i] = $row['updated_at'];

			$i += 1;
		}
	}
	$_SESSION['total_send'] = count($_SESSION['num']);
} else {
	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();
	$i = 0;

	$sql = "SELECT * FROM send_one WHERE user = '" . $_POST['txtuserid'] . "' ORDER BY archivopdf";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['send_archivo'][$i] = $row['archivopdf'];
			$_SESSION['send_estado'][$i] = $row['estado'];
			$_SESSION['send_created'][$i] = $row['created_at'];
			$_SESSION['send_updated'][$i] = $row['updated_at'];
			$i += 1;
		}
	}
	$_SESSION['total_send'] = count($_SESSION['num']);
}
?>



<div class="form-gridview">
	<table class="default">
		<h2 class="titlecenter"> Envío 1 </h2>
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
			';
			echo '	
					</tr>
			';
		}
		$path = '../send_one/sendonepdf/' . $_POST["txtuserid"];

		$total_path = 0;
		if (file_exists($path)) {
			$directorio = opendir($path);
			$i = 0;
			while (false !== ($archivo = readdir($directorio))) {
				if (!is_dir($archivo)) {
					$_SESSION['path'][$i] = $path;
					$_SESSION['archivo_path'][$i] = $archivo;
					$i++;
				}
			}
			$total_path = count($_SESSION['archivo_path']);
		}

		//verificando que la tabla no venga vacia
		if ($_SESSION['total_send'] != 0) {

			for ($i = 0; $i < $total_path; $i++) {
				for ($j = 0; $j < $_SESSION['total_send']; $j++) {
					if ($_SESSION['archivo_path'][$i] == $_SESSION['send_archivo'][$j]) {
						$_SESSION['index'][$i] = $_SESSION['num'][$j];
					}
				}
			}

			//verificando que las variables de la tabla no esten vacias 
			if ($total_path != 0) {

				//Añadiendo archivos con documentos existentes en el sistema
				for ($i = 0; $i < min($_SESSION['total_send'], $_SESSION['total_send']); $i++) {
					$band = 0;
					$archivo = $_SESSION['send_archivo'][$i];
					$estado = $_SESSION['send_estado'][$i];
					$creado = $_SESSION['send_created'][$i];
					$actualizado = $_SESSION['send_updated'][$i];
					for ($j = 0; $j < $total_path; $j++) {
						if ($_SESSION['send_archivo'][$i] == $_SESSION['archivo_path'][$j]) {
							$path = $_SESSION['path'][$j];
							echo '
														<tr>
															<td>' . $archivo . '</td>
															<td class="center">' . $estado . '</td>
															<td class="center">' . $creado . '</td>
															<td class="center">' . $actualizado . '</td>
															<td> 
																<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
																	title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
																	name="btn" value="form_consult" type="submit"></button>
																</div>
															</td>													
														</tr>
								';
							$band++;
						}
					}
					//Añadiendo archivos sin documentos en el sistema
					if ($band == 0) {
						echo '
														<tr>
															<td>' . $archivo . '</td>
															<td class="center">' . $estado . '</td>
															<td class="center">' . $creado . '</td>
															<td class="center">' . $actualizado . '</td>
															<td> 
																<div data="' . $path . '/' . $archivo . '">
																	<a href="' . $archivo . '" title="Archivo adjunto no disponible" class="btnview" target="_blank">
																	<button class="btndelete" name="btn" value="form_consult" type="submit"></button>
																</div>
															</td>													
														</tr>
								';
					}
				}
			} else {

				//Se Añade todo documento que no tenga el archivo pdf en sistema
				for ($i = 0; $i < min($_SESSION['total_send'], $_SESSION['total_send']); $i++) {
					$archivo = $_SESSION['send_archivo'][$i];
					$estado = $_SESSION['send_estado'][$i];
					$creado = $_SESSION['send_created'][$i];
					$actualizado = $_SESSION['send_updated'][$i];
					echo '
														<tr>
															<td>' . $archivo . '</td>
															<td class="center">' . $estado . '</td>
															<td class="center">' . $creado . '</td>
															<td class="center">' . $actualizado . '</td>
															<td> 
																<div data="' . $path . '/' . $archivo . '">
																<a href="' . $archivo . '" title="Archivo adjunto no disponible para la descarga" class="btnview" target="_blank">
																<button class="btndelete" name="btn" value="form_consult" type="submit"></button>
																</div>
															</td>													
														</tr>';
				}
			}
		}
		//reiniando array para evitar sobre escritura de informacion
		$_SESSION['path'] = array();
		$_SESSION['archivo_path'] = array();
		$_SESSION['index'] = array();
		$_SESSION['send_archivo'] = array();
		$_SESSION["send_estado"] = array();
		$_SESSION["send_created"] = array();
		$_SESSION["send_updated"] = array();
		$archivo = array();
		$estado = array();
		$creado = array();
		$actualizado = array();
		?>
	</table>

	<?php
	if ($_SESSION['total_send'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
			';
	}
	?>

</div>
<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options-disabled.php";
	?>
	# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
	// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 202450
	// Betty Lizeth Rodriguez Salas[SaoriCoder]
	# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
</div>