<?php
include_once 'security.php';
?>
<!--Botones habilitados y desabilitados-->
<div class="form-options">
	<div class="options">
		<form action="" method="POST">
			<button class="btn btn-add icon" name="btn" value="form_add" type="submit" title="Añadir archivo" >add</button>
		</form>
		<form action="" method="POST">
			<button class="btn btn-disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
		</form>
		<form action="" method="POST">
			<button class="btn btn-disabled icon" name="btn" value="form_printer" type="submit" disabled>print</button>
		</form>
		<form action="" method="POST">
			<button id="btnExitOptions" class="btn btn-disabled icon" name="btn" value="form_default" type="submit">close</button>
		</form>
	</div>
	<div class="search">
		<form name="form-search" action="" method="POST">
			<p>
				<input type="text" class="text-search" name="search" placeholder="Buscar..." disabled>
				<button class="btn-search btn-disabled icon" type="submit" disabled>search</button>
			</p>
		</form>
	</div>
</div>


<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>