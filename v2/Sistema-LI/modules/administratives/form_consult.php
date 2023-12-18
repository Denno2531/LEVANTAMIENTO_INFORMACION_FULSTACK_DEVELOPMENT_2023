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
		$_SESSION['administratives_cedula'] = $row['cedula'];
		$_SESSION['administratives_celular'] = $row['celular'];
		$_SESSION['administratives_pass'] = $row['pass'];
		$_SESSION['administratives_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['administratives_carrer'] = $row['carrer'];
		$_SESSION['administratives_email'] = $row['email'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
	</div>
	<div class="body">
		<form name="form-consult-administratives" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default" />
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="<?php echo $_SESSION['administratives_name']; ?>" disabled />
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['administratives_surnames']; ?>" disabled />
					<label class="label">ID</label>
					<input class="text" type="text" name="txtid" value="<?php echo $_SESSION['administratives_id']; ?>" disabled />
					<label class="label">Sede</label>
					<input class="text" type="text" name="txtsede" value="<?php echo $_SESSION['administratives_sede']; ?>" disabled />	
				</div>
				<div class="last">
					<label class="label">Cedula</label>
					<input class="text" type="text" name="txtcedula" value="<?php echo $_SESSION['administratives_cedula']; ?>" disabled />
					<label class="label">Celular</label>
					<input class="text" type="text" name="txtcelular" value="<?php echo $_SESSION['administratives_celular']; ?>" disabled />
					<label class="label">Contraseña</label>
					<input class="text" type="text" name="txtpass" value="<?php echo $_SESSION['administratives_pass']; ?>" disabled />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['administratives_date_of_birth']; ?>" disabled />
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" disabled>
						<?php
						$career = $_SESSION['administratives_career'];

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
				<div class="first">
					<label class="label">Email</label>
					<input class="text" type="text" name="txtemail" value="<?php echo $_SESSION['administratives_email']; ?>" disabled />						
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
<script src="/js/modules/administratives.js" type="text/javascript"></script>