<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['empre_pass'] = $row['pass'];
		$_SESSION['empre_name'] = $row['name'];
		$_SESSION['empre_surnames'] = $row['surnames'];
		$_SESSION['empre_gender'] = $row['gender'];
		$_SESSION['empre_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['empre_curp'] = $row['cedula'];
		$_SESSION['empre_rfc'] = $row['address'];
		$_SESSION['empre_phone'] = $row['phone'];
		$_SESSION['empre_documentation'] = $row['email'];
		$_SESSION['empre_pass'] = $row['pass'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-emprendedor" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>	
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">				
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label for="txtuserpass" class="label">Contraseña</label>
					<input id="txtuserpass" class="text" type="text" name="txtpass" value="<?php echo $_SESSION['empre_pass']; ?>" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['empre_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['empre_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />

					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['empre_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />		
				</div>
				<div class="last">
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectGender" required>
						<?php
						if ($_SESSION['empre_gender'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="mujer">Femenino</option>
								<option value="hombre">Masculino</option>
								<option value="otro">Otro</option>								
							';
						} elseif ($_SESSION['empre_gender'] == 'mujer') {
							echo '
								<option value="mujer">Femenino</option>
								<option value="hombre">Masculino</option>
								<option value="otro">Otro</option>								
							';
						} elseif ($_SESSION['empre_gender'] == 'hombre') {
							echo '
								<option value="hombre">Masculino</option>
								<option value="mujer">Femenino</option>
								<option value="otro">Otro</option>								
							';
						} elseif ($_SESSION['empre_gender'] == 'otro') {
							echo '
								<option value="otro">Otro</option>
								<option value="mujer">Femenino</option>
								<option value="hombre">Masculino</option>								
							';
						}
						?>
					</select>	
					<label for="txtusercurp" class="label">Cédula</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['empre_curp']; ?>" placeholder="Cédula de Identidad" pattern="[0-9]{10}" maxlength="10" required />
					<label for="txtuserrfc" class="label">Nacionalidad</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['empre_rfc']; ?>" placeholder="Nacionalidad" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['empre_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="9998887766" maxlength="10" required />

					<label for="dateuseradmission" class="label">Correo Electrónico</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['empre_documentation']; ?>" placeholder="Correo" maxlength="200" required />
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/emprendedor.js" type="text/javascript"></script>

