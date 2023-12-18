<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

?>
<div class="form-gridview">
	<table class="default">
		<?php
		if ($_SESSION['total_infoq'] != 0) {
			echo '
					<tr>
						<th>Id Doc.</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th class="center"><a class="icon">download</a></th>
						<th class="center"><a class="icon">edit</a></th>
			';
			if ($_SESSION['permissions'] != 'editor') {
				echo '<th class="center"><a class="icon">delete</a></th>';
			}
			echo '	
					</tr>
			';
		}
		for ($i = 0; $i < $_SESSION['total_infoq']; $i++) {
			$path = '../Informes_Quincenales/informesquincenalespdf/' . $_SESSION['idinfoq_estudents'][$i] ;
			if(file_exists($path)){
				$directorio= opendir($path);
				$a=0;
				while($archivo=readdir($directorio) && $a<1){
					$a=1;
					if(!is_dir($archivo)){
						echo '
								<tr>
									<td>' . $_SESSION["id_infoq"][$i] . '</td>
									<td>' . $_SESSION["userinfoq_name"][$i] . '</td>
									<td>' . $_SESSION["userinfoq_surname"][$i] . '</td>
									<td>
										<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $_SESSION["infoq_estudent_pdf"][$i] . '"
										title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
										name="btn" value="form_consult" type="submit"></button></td>
									</td>
									<td>
										<form action="" method="POST">
											<input style="display:none;" type="text" name="txtidteacher" value="' . $_SESSION["id_infoq"][$i] . '"/>
											<button class="btnedit" name="btn" value="form_update" type="submit"></button>
										</form>
									</td>';
						echo '
								</tr>
							';
					}
				}
			}
		}
		?>
	</table>
	<?php
	if ($_SESSION['total_infoq'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}
	if ($_SESSION['total_infoq'] != 0) {
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
	include_once "../sections/options.php";
	?>
</div>


<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>