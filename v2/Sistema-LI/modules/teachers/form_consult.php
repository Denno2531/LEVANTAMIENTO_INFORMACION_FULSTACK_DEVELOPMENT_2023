<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['teacher_name'] = $row['name'];
		$_SESSION['teacher_surnames'] = $row['surnames'];
		$_SESSION['teacher_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['teacher_gender'] = $row['gender'];
		$_SESSION['teacher_cedula'] = $row['cedula'];
		$_SESSION['teacher_id'] = $row['id'];
		$_SESSION['teacher_pass'] = $row['pass'];
		$_SESSION['teacher_phone'] = $row['phone'];
		$_SESSION['teacher_address'] = $row['address'];
		$_SESSION['teacher_level_studies'] = $row['level_studies'];
		$_SESSION['teacher_email'] = $row['email'];
		$_SESSION['teacher_career'] = $row['career'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
	</div>
	<div class="body">
		<form name="form-consult-teachers" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default" />
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="<?php echo $_SESSION['teacher_name']; ?>" disabled />
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['teacher_surnames']; ?>" disabled />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['teacher_date_of_birth']; ?>" disabled />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" disabled>
						<?php
						if ($_SESSION['teacher_gender'] == '') {
							echo '
						<option value="">Seleccione</option>
						<option value="mujer">Mujer</option>
						<option value="hombre">Hombre</option>
						<option value="otro">Otro</option>
						<option value="nodecirlo">Prefiero no decirlo</option>
						';
						} elseif ($_SESSION['teacher_gender'] == 'mujer') {
							echo '
						<option value="mujer">Mujer</option>
						<option value="hombre">Hombre</option>
						<option value="otro">Otro</option>
						<option value="nodecirlo">Prefiero no decirlo</option>
						';
						} elseif ($_SESSION['teacher_gender'] == 'hombre') {
							echo '
						<option value="hombre">Hombre</option>
						<option value="mujer">Mujer</option>
						<option value="otro">Otro</option>
						<option value="nodecirlo">Prefiero no decirlo</option>
						';
						} elseif ($_SESSION['teacher_gender'] == 'otro') {
							echo '
						<option value="otro">Otro</option>
						<option value="mujer">Mujer</option>
						<option value="hombre">Hombre</option>
						<option value="nodecirlo">Prefiero no decirlo</option>
						';
						} elseif ($_SESSION['teacher_gender'] == 'nodecirlo') {
							echo '
						<option value="nodecirlo">Prefiero no decirlo</option>
						<option value="otro">Otro</option>
						<option value="mujer">Mujer</option>
						<option value="hombre">Hombre</option>
						';
						}
						?>
					</select>
					<label class="label">Nivel de estudios</label>
					<select class="select" name="selectnivelestudios" disabled>
						<?php
						if ($_SESSION['teacher_level_studies'] == 'Licenciatura') {
							echo
							'
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['teacher_level_studies'] == 'Ingenieria') {
							echo
							'
								<option value="Ingenieria">Ingenieria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['teacher_level_studies'] == 'Maestria') {
							echo
							'
								<option value="Maestria">Maestria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['teacher_level_studies'] == 'Doctorado') {
							echo
							'
								<option value="Doctorado">Doctorado</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
							';
						}
						?>
					</select>				
				</div>
				<div class="last">
					<label class="label">Cedula</label>
					<input class="text" type="text" name="txtcedula" value="<?php echo $_SESSION['teacher_cedula']; ?>" disabled />
					<label class="label">ID</label>
					<input class="text" type="text" name="txtid" value="<?php echo $_SESSION['teacher_id']; ?>" disabled />
					<label class="label">Contraseña</label>
					<input class="text" type="text" name="txtpass" value="<?php echo $_SESSION['teacher_pass']; ?>" disabled />
					<label class="label">Número de teléfono</label>
					<input class="text" type="text" name="txtphone" value="<?php echo $_SESSION['teacher_phone']; ?>" disabled />
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['teacher_address']; ?>" disabled />
					<label class="label">Correo</label>
					<input class="text" type="email" name="txtemail" value="<?php echo $_SESSION['teacher_email']; ?>" disabled />
				</div>
				<div class="last">
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" disabled>
						<?php
						$career = $_SESSION['teacher_career'];

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
			</div>
			<button id="btnBack" class="btn back icon" type="button">arrow_back</button>
			<button id="btnNext" class="btn icon" type="button">arrow_forward</button>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/teachers.js" type="text/javascript"></script>