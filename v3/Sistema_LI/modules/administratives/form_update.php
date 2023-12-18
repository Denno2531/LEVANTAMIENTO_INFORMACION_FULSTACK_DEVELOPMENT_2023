<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['administratives_name'] = $row['name'];
		$_SESSION['administratives_surnames'] = $row['surnames'];
		$_SESSION['administratives_id'] = $row['id'];
		$_SESSION['administratives_sede'] = $row['sede'];
		$_SESSION['administratives_email'] = $row['email'];
		$_SESSION['administratives_cedula'] = $row['cedula'];
		$_SESSION['administratives_celular'] = $row['celular'];
		$_SESSION['administratives_pass'] = $row['pass'];
		$_SESSION['administratives_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['administratives_carrer'] = $row['carrer'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-administratives" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['administratives_name']; ?>" placeholder="Nombre" maxlength="30" required autofocus />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" placeholder="Apellidos" value="<?php echo $_SESSION['administratives_surnames']; ?>" maxlength="60" required />
                    <label for="txtid" class="label">ID</label>
                    <input id="txtid" class="text" type="text" name="txtid" pattern="[A-Za-z0-9]{9}" maxlength="9" value="<?php echo $_SESSION['administratives_id']; ?>" placeholder="L00124281"  required />
                    <label for="selectsede" class="label">Sede</label>
					<select id="selectsede" class="select" name="selectSede" required>
						<?php
						if ($_SESSION['administratives_sede'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						} elseif ($_SESSION['administratives_sede'] == 'matriz') {
							echo '
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						} elseif ($_SESSION['administratives_sede'] == 'latacunga') {
							echo '
								<option value="latacunga">Latacunga</option>
								<option value="matriz">Matriz</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						}  elseif ($_SESSION['administratives_sede'] == 'stodomingo') {
							echo '
								<option value="stodomingo">Sto. Domingo</option>								
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
							';
						}
						?>
					</select>    
                </div>
                <div class="last">
                    <label for="txtcedula" class="label">Cédula</label>
                    <input id="txtcedula" class="text" type="text" name="txtcedula" value="<?php echo $_SESSION['administratives_cedula']; ?>" placeholder="1600894560" pattern="[0-9]{10}" maxlength="10" onkeyup="this.value = this.value.toUpperCase()" required />
                    <label for="txtcelular" class="label">Celular</label>
                    <input id="txtcelular" class="text" type="text" name="txtcelular" value="<?php echo $_SESSION['administratives_celular']; ?>" placeholder="0979304658" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." maxlength="10" required />
                    <label for="txtuserpass" class="label">Contraseña</label>
                    <input id="txtuserpass" class="text" type="text" name="txtpass" value="<?php echo $_SESSION ['administratives_pass']; ?>" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
                    <label for="dateofbirth" class="label">Fecha de nacimiento</label>
                    <input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['administratives_date_of_birth']; ?>"  placeholder="aaaa-mm-dd" pattern="\d{4}-\d{2}-\d{2}" maxlength="10" required />
                    <label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" required>
						<?php
						$career = $_SESSION['administratives_carrer'];

						if ($career == '') {
							echo
							'
								<option value="">Seleccione</option>
							';
						}

						$sql = "SELECT career, name FROM careers";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								if ($row['career'] == $career) {
									echo
									'
										<option value="' . $row['career'] . '" selected>' . $row['name'] . '</option>
									';
								} else {
									echo
									'
										<option value="' . $row['career'] . '">' . $row['name'] . '</option>
									';
								}
							}
						}
						?>
					</select>
                </div>
                <div class="last">
                    <label for="txtemail" class="label">Email</label>
                    <input id="txtemail" class="text" type="text" name="txtemail" value="<?php echo $_SESSION['administratives_email']; ?>" placeholder="Correo electrónico" maxlength="60" required />
                </div>
			</div>
			<button id="btnBack" class="btn back icon" type="button">arrow_back</button>
			<button id="btnNext" class="btn icon" type="button">arrow_forward</button>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/administratives.js" type="text/javascript"></script>