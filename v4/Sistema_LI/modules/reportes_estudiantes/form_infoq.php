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
$sql = "SELECT * FROM infoq";
if ($resultado = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($resultado)) {
		$_SESSION['infoq_description'] = $row['descripcion'];
		$_SESSION['send_estado'] = $row['estado'];
		$_SESSION['send_created'] = $row['created_at'];
		$_SESSION['send_updated'] = $row['updated_at'];
	}
}


if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['user_id'] = array();
	$_SESSION['num'] = array();
	$_SESSION['justificaciones_archivo'] = array();
	$_SESSION['justificaciones_description'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();

	$i = 0;

	$sql = "SELECT * FROM infoq WHERE num LIKE '%" . $_POST['search'] . "%' OR archivo LIKE '%" . $_POST['search'] . "%' OR user LIKE '%" . $_POST['search'] . "%' OR num LIKE '%" . $_POST['search'] . "%' OR description LIKE '%" . $_POST['search'] . "%' ORDER BY num";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['justificaciones_archivo'][$i] = $row['archivopdf'];
			$_SESSION['justificaciones_description'][$i] = $row['descripcion'];
			$_SESSION['send_estado'][$i] = $row['estado'];
			$_SESSION['send_created'][$i] = $row['created_at'];
			$_SESSION['send_updated'][$i] = $row['updated_at'];

			$i += 1;
		}
	}
	$_SESSION['total_infoq'] = count($_SESSION['num']);
} else {
	$_SESSION['num'] = array();
	$_SESSION['justificaciones_archivo'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();
	$i = 0;

	$sql = "SELECT * FROM infoq WHERE user='" . $_POST['txtuserid'] . "'ORDER BY archivopdf"; //LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['justificaciones_archivo'][$i] = $row['archivopdf'];
			$_SESSION['send_estado'][$i] = $row['estado'];
			$_SESSION['send_created'][$i] = $row['created_at'];
			$_SESSION['send_updated'][$i] = $row['updated_at'];
			$i += 1;
		}
	}
	$_SESSION['total_infoq'] = count($_SESSION['num']);
	console($_SESSION['total_infoq']);
}

// Pagina actual
if (!empty($_POST['page_info'])) {
	$page_info = $_POST['page_info'];
} else {
	$page_info = 1;
}

// Numero de registros a visualizar
$max_info = 8;
$inicio_info = ($page_info - 1) * $max_info;
$tpage_info = ceil($_SESSION['total_infoq'] / $max_info);
console($tpage_info);
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
							
			';
			echo '	
					</tr>
			';
		}

		$path = '../Informes_Quincenales/informesquincenalespdf/' . $_POST["txtuserid"];
		$index = 0;
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
				$index = $i + 1;
			}
		} else if ($index != 0) {

			if ($_SESSION['total_send'] != 0) {
				for ($i = $index; $i < min($_SESSION['total_infoq'], $_SESSION['total_infoq']); $i++) {
					$archivo = $_SESSION['justificaciones_archivo'][$i];
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
		$_SESSION['justificaciones_archivo'] = array();
		$_SESSION["send_estado"] = array();
		$_SESSION["send_created"] = array();
		$_SESSION["send_updated"] = array();
		?>
	</table>


	<?php
	if ($_SESSION['total_infoq'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}

	if ($_SESSION['total_users'] != 0) {
		echo '
				<nav aria-label="Page navigation example">
					<ul class="pagination">
			';

		// Botón de flecha izquierda si no está en la primera página

		$page_actual = $_SERVER['PHP_SELF'] . "?pagina=";
		console($page_actual);
		if ($page_info > 1) {
			echo '
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
		  					</a>
						</li>
		  		';
		}

		// Limita la cantidad de páginas visibles a la vez
		$maxVisiblePages = 8;
		$startPage = max(1, $page_info - floor($maxVisiblePages / 2));
		$endPage = min($startPage + $maxVisiblePages - 1, $tpage_info);

		// Crea botones para las páginas dentro del rango visible

		if ($tpage_info > 1) {
			for ($n = $startPage; $n <= $endPage; $n++) {
				$page_actual = $_SERVER['PHP_SELF'] . "?pagina=";
				console($page_actual);
				if ($page_info == $n) {
					$page_actual = $page_actual . $n;
					echo '<li class="page-item active"><a class="page-link" href="?' . $page_actual . '">' . $n . '</a></li>';
				} else {
					$page_actual = $page_actual . $n;
					echo '<li class"page-item" ><a class="page-link" href="?' . $page_actual . '">' . $n . '</a></li>';
				}
			}
		}

		// Botón de flecha derecha si no está en la última página
		if ($page_info < $tpage_info) {
			echo '
					<li class="page-item">
      					<a class="page-link" href="#" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
        					<span class="sr-only">Next</span>
      					</a>
    				</li>
			';
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