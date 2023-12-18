<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-gridview">
	<table class="users">
		<?php
		if ($_SESSION['total_users'] != 0) {
			echo '
					<tr>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Apellido</th>						
						<th>Correo</th>						
						<th>Permisos</th>
						<th>Rol</th>						
						<th class="center"><a class="icon">edit</a></th>
						<th class="center"><a class="icon">delete</a></th>
					</tr>
		';
		}
		for ($i = 0; $i < $_SESSION['total_users']; $i++) {
			echo '
		    		<tr>
						<td>' . $_SESSION["user_id"][$i] . '</td>
						<td>' . $_SESSION["user_name"][$i] . '</td>
						<td>' . $_SESSION["user_surnames"][$i] . '</td>												
						<td class="tdbreak">' . $_SESSION["user_email"][$i] . '</td>
						<td>' . $_SESSION["user_type"][$i] . '</td>
						<td>' . $_SESSION["user_rol"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="id" value="' . $_SESSION["user_id"][$i] . '"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
							
						<td>
						<form action="" method="POST">
							<input style="display:none;" type="text" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
							<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
						</form>
					</td>
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
		for ($n = 1; $n <= $tpages; $n++) {
			if ($page == $n) {
				echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			} else {
				echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			}
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






<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>