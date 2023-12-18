<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM students WHERE sede='latacunga'";

$max = 20;
$inicio = 0;

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$sql = "SELECT COUNT(user) AS total FROM students";

		if ($result = $conexion->query($sql)) {
			if ($row = mysqli_fetch_array($result)) {
				$tpages = ceil($row['total'] / $max);
			}
		}

		if (!empty($_POST['search'])) {
			$_POST['search'] = trim($_POST['search']);
			$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

			$_SESSION['user_id'] = array();
			$_SESSION['student_departamento'] = array();
			$_SESSION['student_career'] = array();
			$_SESSION['student_email'] = array();
			$_SESSION['student_status'] = array();
			$_SESSION['student_sede'] = array();
			$_SESSION['student_jerarquia'] = array();
			$_SESSION['student_jornada'] = array();
			$_SESSION['student_name'] = array();
			$_SESSION['student_cedula'] = array();
			$_SESSION['student_date'] = array();
			$_SESSION['student_documentation'] = array();

			$i = 0;

			$sql = "SELECT * FROM students WHERE user LIKE '%" . $_POST['search'] . "%' OR email LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR surnames LIKE '%" . $_POST['search'] . "%' OR cedula LIKE '%" . $_POST['search'] . "%' OR admission_date LIKE '%" . $_POST['search'] . "%' OR documentation LIKE '%" . $_POST['search'] . "%' OR estado LIKE '%" . $_POST['search'] . "%' OR jerarquia LIKE '%" . $_POST['search'] . "%' OR jornada LIKE '%" . $_POST['search'] . "%' OR career LIKE '%" . $_POST['search'] . "%' OR sede LIKE '%" . $_POST['search'] . "%' OR departamento LIKE '%" . $_POST['search'] . "%' ORDER BY name";
			echo $sql . '<br>';
			if ($result = $conexion->query($sql)) {
				while ($row = mysqli_fetch_array($result)) {
					$_SESSION['user_id'][$i] = $row['user'];
					$_SESSION['student_cedula'][$i] = $row['cedula'];
					$_SESSION['student_name'][$i] = $row['name'] . ' ' . $row['surnames'];
					$_SESSION['student_date'][$i] = $row['admission_date'];
					$_SESSION['student_email'][$i] = $row['email'];
					$_SESSION['student_departamento'][$i] = $row['departamento'];
					$_SESSION['student_documentation'][$i] = $row['documentation'];
					$_SESSION['student_status'][$i] = $row['estado'];
					$_SESSION['student_sede'][$i] = $row['sede'];
					$_SESSION['student_jerarquia'][$i] = $row['jerarquia'];
					$_SESSION['student_jornada'][$i] = $row['jornada'];
					$_SESSION['student_career'][$i] = $row['career'];



					$i += 1;
				}
			}
			$_SESSION['total_users'] = count($_SESSION['user_id']);
		} else {
			$_SESSION['user_id'] = array();
			$_SESSION['student_name'] = array();
			$_SESSION['student_cedula'] = array();
			$_SESSION['email'] = array();
			$_SESSION['student_departamento'] = array();
			$_SESSION['student_career'] = array();
			$_SESSION['student_documentation'] = array();
			$_SESSION['student_date'] = array();
			$_SESSION['student_status'] = array();
			$_SESSION['student_sede'] = array();
			$_SESSION['student_jerarquia'] = array();
			$_SESSION['student_jornada'] = array();

			
			function visibiliza($i, $inicio, $max)
			{
				$sql = "SELECT * FROM students WHERE sede='latacunga' AND estado='activo' ORDER BY created_at DESC, user, NAME  LIMIT $inicio, $max";
				global $_SESSION, $conexion;

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['student_cedula'][$i] = $row['cedula'];
						$_SESSION['student_name'][$i] = $row['name'] . ' ' . $row['surnames'];
						$_SESSION['email'][$i] = $row['email'];
						$_SESSION['student_date'][$i] = $row['admission_date'];
						$_SESSION['student_departamento'][$i] = $row['departamento'];
						$_SESSION['student_documentation'][$i] = $row['documentation'];
						$_SESSION['student_status'][$i] = $row['estado'];
						$_SESSION['student_sede'][$i] = $row['sede'];
						$_SESSION['student_jerarquia'][$i] = $row['jerarquia'];
						$_SESSION['student_jornada'][$i] = $row['jornada'];
						$_SESSION['student_career'][$i] = $row['career'];

						$i += 1;
					}
				}

				return $sql;
			}
			
			$i = 0;
			

			visibiliza($i, $inicio, $max);

			$_SESSION['total_users'] = count($_SESSION['user_id']);
		}
	}
}
?>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<meta name="robots" content="noindex">
	<meta name="google" value="notranslate">
	<link rel="icon" type="image/png" href="/images/icon.png" />
	<title>Asignaturas | Sistema de Control Escolar</title>
	<meta name="description" content="Sistema Escolar, gestión de asistencias." />
	<link rel="stylesheet" href="/css/style.css?v=<?php echo (rand()); ?>" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/select2.css" media="screen, projection" type="text/css" />
	<script src="/js/external/jquery.min.js" type="text/javascript"></script>
	<script src="/js/external/prefixfree.min.js" type="text/javascript"></script>
	<script src="/js/controls/unsetnotif.js" type="text/javascript"></script>
	<script src="/js/external/select2.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$(".loader").fadeOut("slow");
		});
	</script>

	<div class="form-gridview">
		<div class="head">
			<h1 class="textList">Estudiantes Sede Latacunga</h1>
		</div>
		<div class="scrollable-container ">
		<div class="body">
			<table class="default">
				</head>

<body>

				
				<?php
				if ($_SESSION['total_users'] != 0) {
					echo '
					<tr>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Cédula</th>
						<th class="center" style="width: 80px;">Fecha de Admisión</th>
						<th class="center"><a class="icon">visibility</a></th>
						<th class="center"><a class="icon">edit</a></th>
						
			';
					if ($_SESSION['permissions'] != 'editor') {
						echo '<th class="center"><a class="icon">delete</a></th>';
					}
					echo '
					</tr>
			';
				}
				for ($i = 0; $i < $_SESSION['total_users']; $i++) {
					echo '
		    		<tr>
		    			<td>' . $_SESSION["user_id"][$i] . '</td>
						<td>' . $_SESSION["student_name"][$i] . '</td>
						<td class="tdbreakw">' . $_SESSION["student_cedula"][$i] . '</td>
						<td class="center">' . $_SESSION["student_date"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
								<button class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
								<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
							</form>
						</td>
					</tr>
				';
				}
				?>
			</table>
			<br>
			<br>
			</div>
		</div>
	</div>
	<div class="content-aside">
		<?php
		include_once '../notif_info.php';
		include_once "../sections/options.php";
		?>
	</div>
</body>

<script src="/js/modules/students.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
	integrity="sha512-0sCz7O9XlHUBlTepQg2tL/j/ZtMInzGRBfKv2n/bGEB1MkXkXpy0eMHvG+vcnBfACpJZl+S6Z5p5r5L5Hy5U2Q=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />


<?php


# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>