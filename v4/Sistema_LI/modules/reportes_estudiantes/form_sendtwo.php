<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';
function console($datos)
{
	$console = $datos;
	if (is_array($console)) {
		$console = implode(',', $console);
	}
	echo "<script>console.log('Console: " . $console . "');</script>";
}

$sql = "SELECT * FROM send_two";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['send_estado'] = $row['estado'];
		console($_SESSION['send_estado']);
		$_SESSION['send_created'] = $row['created_at'];
		console($_SESSION['send_created']);
		$_SESSION['send_updated'] = $row['updated_at'];
		console($_SESSION['send_updated']);
	}
}
// Debes definir el valor de $max antes de usarlo en el cálculo de $tpages
$max = 10; // Aquí debes proporcionar el valor apropiado

$sql = "SELECT COUNT(num) AS total FROM send_two";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_two WHERE num LIKE '%" . $_POST['search'] . "%' OR archivo LIKE '%" . $_POST['search'] . "%' OR user LIKE '%" . $_POST['search'] . "%' OR descripcion LIKE '%" . $_POST['search'] . "%' ORDER BY num";

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
} else {
	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_two WHERE user = '" . $_POST['txtuserid'] . "' ORDER BY archivopdf";

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
			';
			echo '	
					</tr>
			';
		}
		$path = '../send_two/sendtwopdf/' . $_POST["txtuserid"];
		if (file_exists($path)) {
			$directorio = opendir($path);
			while ($archivo = readdir($directorio)) {
				if (!is_dir($archivo)) {
					$estado = $_SESSION['send_estado'][$i];
					$creado = $_SESSION['send_created'][$i];
					$actualizado = $_SESSION['send_updated'][$i];
					echo '
													<tr>
														<td>' . $archivo . '</td>
														<td>' . $estado . '</td>
														<td>' . $creado . '</td>
														<td>' . $actualizado . '</td>
														<td> 
															<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
															title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
															name="btn" value="form_consult" type="submit"></button>
														</td>												
													</tr>';
				}
				$i += 1;
			}
		} else {

			if ($_SESSION['total_send'] != 0) {
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
															<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
															title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
															name="btn" value="form_consult" type="submit"></button>
														</td>													
													</tr>';
				}
			}
		}
		$_SESSION["send_estado"] = array();
		$_SESSION["send_created"] = array();
		$_SESSION["send_updated"] = array();

		?>
	</table>
	<?php
	if ($_SESSION['total_users'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
			';
	}

	if ($_SESSION['total_users'] != 0) {
		echo '
				<div class="pages">
					<ul>
			';

		// Botón de flecha izquierda si no está en la primera página
		if ($page > 1) {
			echo '<li class="arrow-button"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . ($page - 1) . '">&larr;</button></form></li>';
		}

		// Limita la cantidad de páginas visibles a la vez
		$maxVisiblePages = 5;
		$startPage = max(1, $page - floor($maxVisiblePages / 2));
		$endPage = min($startPage + $maxVisiblePages - 1, $tpages);

		// Crea botones para las páginas dentro del rango visible
		for ($n = $startPage; $n <= $endPage; $n++) {
			if ($page == $n) {
				echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" id="' . $n . '"  name="page" value="' . $n . '">' . $n . '</button></form></li>';
			} else {
				echo '<li><form name="form-pages" action="" method="POST"><button type="submit" id="' . $n . '" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			}
		}

		// Botón de flecha derecha si no está en la última página
		if ($page < $tpages) {
			echo '<li class="arrow-button"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . ($page + 1) . '">&rarr;</button></form></li>';
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