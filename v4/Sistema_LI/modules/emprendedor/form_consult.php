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
		$_SESSION['empre_nameorganization'] = $row['nameorganization'];
		$_SESSION['empre_state'] = $row['state'];
		$_SESSION['empre_startdate'] = $row['startdate'];
		$_SESSION['empre_socialsales'] = $row['socialsales'];
		$_SESSION['empre_city'] = $row['city'];
		$_SESSION['empre_workinghours'] = $row['workinghours'];
		$_SESSION['empre_socialnetworks'] = $row['socialnetworks'];
		$_SESSION['empre_education'] = $row['education'];
		$_SESSION['empre_salesyear'] = $row['salesyear'];
		$_SESSION['empre_heritage'] = $row['heritage'];		
				
	}
} 
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
	</div>
	<div class="body">
		<form name="form-consult-emprendedor" action="#" method="POST">
		<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>	
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">				
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label for="txtuserpass" class="label">Contraseña</label>
					<input id="txtuserpass" class="text" type="text" name="txtpass" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['empre_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['empre_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />

					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="date" name="dateofbirth" value="<?php echo $_SESSION['empre_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />	
					<label for="txtcity" class="label">Ciudad</label>
					<input id="txtcity" class="text" type="text" name="txtcity" value="<?php echo $_SESSION['empre_city']; ?>" placeholder="ciudad" maxlength="50" required />	
					<div class="hour-picker">
						<label for="txtworkinghours_start" class="text">Abierto desde:</label>
						<input id="txtworkinghours_start" class="hour-input" type="time" name="txtworkinghours_start">
						<label for="txtworkinghours_start" class="text">Hora de salida:</label>
						<input id="txtworkinghours_start" class="hour-input" type="time" name="txtuserhours_end">
					</div>
					<div class="three">
					<label for="selecteducation" class="label">Nivel de educación</label>
					<select id="selecteducation" class="select" name="selecteducation" required>
						<?php
						if ($_SESSION['empre_education'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="Sin nivel de educacion">Sin Formación</option>
								<option value="Escuela">Escuela</option>
								<option value="Colegio">Colegio</option>	
								<option value="Tecnología">Tecnología</option>
								<option value="Universidad">Universidad</option>		
							';
						} elseif ($_SESSION['empre_education'] == 'Sin nivel academico') {
							echo '
								<option value="Sin nivel de educacion">Sin Formación</option>
								<option value="Escuela">Escuela</option>
								<option value="Colegio">Colegio</option>	
								<option value="Tecnología">Tecnología</option>
								<option value="Universidad">Universidad</option>								
							';
						} elseif ($_SESSION['empre_education'] == 'Escuela') {
							echo '
								<option value="Escuela">Escuela</option>
								<option value="Sin nivel de educacion">Sin Formación</option>
								<option value="Colegio">Colegio</option>	
								<option value="Tecnología">Tecnología</option>
								<option value="Universidad">Universidad</option>							
							';
						} elseif ($_SESSION['empre_education'] == 'Colegio') {
							echo '
							<option value="Colegio">Colegio</option>
							<option value="Escuela">Escuela</option>
							<option value="Sin nivel de educacion">Sin Formación</option>
							<option value="Tecnología">Tecnología</option>
							<option value="Universidad">Universidad</option>								
							';
						}elseif ($_SESSION['empre_education'] == 'Tecnología') {
							echo '
							<option value="Tecnología">Tecnología</option>
							<option value="Colegio">Colegio</option>
							<option value="Escuela">Escuela</option>
							<option value="Sin nivel de educacion">Sin Formación</option>
							<option value="Universidad">Universidad</option>								
							';
						}elseif ($_SESSION['empre_education'] == 'Universidad') {
							echo '							
							<option value="Universidad">Universidad</option>
							<option value="Tecnología">Tecnología</option>
							<option value="Colegio">Colegio</option>
							<option value="Escuela">Escuela</option>
							<option value="Sin nivel de educacion">Sin Formación</option>									
							';
						}
						?>
					</select>	
					<div class="four">
					<label for="selectsocialnetworks" class="label">Utiliza redes sociales</label>
					<select id="selectsocialnetworks" class="select" name="selectsocialnetworks" required>
						<?php
						if ($_SESSION['empre_socialnetworks'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="Si">Si</option>
								<option value="No">No</option>								
							';
						} elseif ($_SESSION['empre_socialnetworks'] == 'Si') {
							echo '
								<option value="Si">Si</option>
								<option value="No">No</option>									
							';
						} elseif ($_SESSION['empre_socialnetworks'] == 'No') {
							echo '
								<option value="No">No</option>
								<option value="Si">Si</option>								
							';
						} 
						?>
					</select>
					</div>
					<div class="five">
                    <label for="inputsalesyear" class="label">Ventas por año</label>
                    <input id="inputsalesyear" class="input" type="float" placeholder="Año 2019" value="<?php echo $_SESSION['empre_salesyear']; ?>" name="inputsalesyear" maxlength="50" required>
                    <input id="inputsalesyear1" class="input" type="float" placeholder="Año 2020" value="<?php echo $_SESSION['empre_salesyear']; ?>" name="inputsalesyear1" maxlength="50" required>
                    <input id="inputsalesyear2" class="input" type="float" placeholder="Año 2021" value="<?php echo $_SESSION['empre_salesyear']; ?>" name="inputsalesyear2" maxlength="50" required>
                    <input id="inputsalesyear3" class="input" type="float" placeholder="Año 2022" value="<?php echo $_SESSION['empre_salesyear']; ?>" name="inputsalesyear3" maxlength="50" required>
                    <input id="inputsalesyear4" class="input" type="float" placeholder="Año 2023" value="<?php echo $_SESSION['empre_salesyear']; ?>" name="inputsalesyear4" maxlength="50" required>

					<div class="six">
                    <label for="inputheritage" class="label">Patrimonio</label>
                    <input id="inputheritage" class="input" type="float" placeholder="Año 2019"  value="<?php echo $_SESSION['empre_heritage']; ?>" name="inputheritage" maxlength="50" required>
                    <input id="inputheritage1" class="input" type="float" placeholder="Año 2020"  value="<?php echo $_SESSION['empre_heritage']; ?>" name="inputheritage1" maxlength="50" required>
                    <input id="inputheritage2" class="input" type="float" placeholder="Año 2021"  value="<?php echo $_SESSION['empre_heritage']; ?>" name="inputheritage2" maxlength="50" required>
                    <input id="inputheritage3" class="input" type="float" placeholder="Año 2022"  value="<?php echo $_SESSION['empre_heritage']; ?>" name="inputheritage3" maxlength="50" required>
                    <input id="inputheritage4" class="input" type="float" placeholder="Año 2023"  value="<?php echo $_SESSION['empre_heritage']; ?>" name="inputheritage4" maxlength="50" required>
                    </div>
					</div>
					</div>
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
					<div class="eight">
					<label for="selectorganization" class="label">Organización</label>
					<select id="selectorganization" class="select" name="selectorganization" required>
						<?php
						if ($_SESSION['empre_organization'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="No">No pertenezco</option>
								<option value="UDELA">UDELA</option>
								<option value="Cooprede>COOPREDE</option>	
								<option value="otro>Otro</option>								
							';
						} elseif ($_SESSION['empre_organization'] == 'No pertenezco') {
							echo '
								<option value="No">No pertenezco</option>
								<option value="UDELA">UDELA</option>
								<option value="Cooprede>COOPREDE</option>	
								<option value="otro>Otro</option>								
							';
						} elseif ($_SESSION['empre_organization'] == 'UDELA') {
							echo '
								<option value="UDELA">UDELA</option>
								<option value="No">No pertenezco</option>
								<option value="Cooprede>COOPREDE</option>	
								<option value="otro>Otro</option>								
							';
						} elseif ($_SESSION['empre_organization'] == 'Cooprede') {
							echo '
							    <option value="Cooprede>COOPREDE</option>	
								<option value="UDELA">UDELA</option>
								<option value="No">No pertenezco</option>
								<option value="otro>Otro</option>							
							';
						}elseif ($_SESSION['empre_organization'] == 'Otro') {
							echo '
								<option value="otro>Otro</option>	
								<option value="Cooprede>COOPREDE</option>	
								<option value="UDELA">UDELA</option>
								<option value="No">No pertenezco</option>							
							';
						}
						?>
					</select>
					<label for="txtnameorganization" class="label">Nombre de empredimiento</label>
					<input id="txtnameorganization" class="text" type="text" name="txtnameorganization" value="<?php echo $_SESSION['empre_nameorganization']; ?>" placeholder="Nombre de empredimiento" autofocus maxlength="50" required />
					<div class="second">
					<label for="selectstate" class="label">Estado</label>
					<select id="selectstate" class="select" name="selectstate" required>
						<?php
						if ($_SESSION['empre_state'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>								
							';
						} elseif ($_SESSION['empre_state'] == 'Activo') {
							echo '
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>									
							';
						} elseif ($_SESSION['empre_state'] == 'Inactivo') {
							echo '
								<option value="Inactivo">Inactivo</option>
								<option value="Activo">Activo</option>								
							';
						} 
						?>
					</select>
					<label for="startdate" class="label">Fecha de incio</label>
					<input id="startdate" class="date" type="date" name="startdate" value="<?php echo $_SESSION['empre_startdate']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />	
					<div class="five">
					<label for="selectsocialsales" class="label">Realiza ventas por redes sociales</label>
					<select id="selectsocialsales" class="select" name="selectsocialsales" required>
						<?php
						if ($_SESSION['empre_socialsales'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="Si">Si</option>
								<option value="No">No</option>								
							';
						} elseif ($_SESSION['empre_socialsales'] == 'Si') {
							echo '
								<option value="Si">Si</option>
								<option value="No">No</option>									
							';
						} elseif ($_SESSION['empre_socialsales'] == 'No') {
							echo '
								<option value="No">No</option>
								<option value="Si">Si</option>										
							';
						} 
						?>
					</select>

					</div>
					</div>
					</div>
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

<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>