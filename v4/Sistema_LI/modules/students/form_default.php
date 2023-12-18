<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>

<div class="form-gridview">

<div class="sede-buttons">
		<h2 class="sede">Sede</h2>
		<div class="buttons">
			<form action="" method="POST">
				<input style="display:none;" type="text" name="txtuserid" value="' . $_SESSION[" user_id"][$i] . '"/>
								<button class="button-effect" name="btn" value="form_womb" type="submit">Matriz</button><br>
							</form>	
			<form action="" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
								
								<button class="button-effect" name="btn" value="form_campus" type="submit">Latacunga</button>
							</form>	
		</div>
	</div>
	<h2 class="textList">Listado</h2>
	<table class="default">
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
			if ($_SESSION['permissions'] != 'edit') {
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
					echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				} else {
					echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
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
	include_once "../sections/options.php";
	?>
</div>





<?php


# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>