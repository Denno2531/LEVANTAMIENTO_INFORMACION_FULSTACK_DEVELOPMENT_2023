<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

include_once 'load_data.php';

?>

<div class="form-data form-config-user">
	<div class="loader-user"></div>
	<div class="body">
		<div class="section-croppie-image">
			<div class="image-crop"></div>
			<div class="options">
				<a href="#" class="change-btn"><span class="icon">sync</span></a>
				<a href="#" class="crop-btn"><span class="icon">crop</span></a>
				<a href="/user" class="cancel-btn"><span class="icon">close</span></a>
			</div>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirmPass()">
			<div class="wrap">
				<div class="first">
					<div class="section-user-image">
						<img src="<?php echo '/images/users/' . $_SESSION['user_image']; ?>" />
						<?php
						$date_time_start = isset($_SESSION['image_updated_at']) ? date_create($_SESSION['image_updated_at']) : date_create('2000-12-23 10:30:15');
						$date_time_end = date_create(date('Y-m-d'));
						$interval = date_diff($date_time_start, $date_time_end);
						$days = intval($interval->format('%a'));

						if ($days >= 15 or $_SESSION['image_updated_at'] == null or $_SESSION['user_image'] == 'user.png') {
							echo '
						<a href="#" class="file"><span class="icon">add_a_photo</span></a>
						<input id="fileuploadimage" style="display: none;" type="file" name="fileuploadimage" accept=".jpg, .jpeg, .png" />
						';
						} else {
							echo '
						<a class="file disabled"><span class="icon">add_a_photo</span></a>
						';
							if ((15 - $days) >= 1) {
								$_SESSION['msgbox_info'] = 1;
								$_SESSION['msgbox_error'] = 0;
								$_SESSION['text_msgbox_info'] = 'Imagen de usuario actualizada recientemente.';
							}
						}
						?>
						<div class="section-user-info">
							<span class="user-name"><?php echo $_SESSION['name'] . ' ' . $_SESSION['surnames']; ?></span>
							<span class="user-rol"><?php echo $_SESSION['user_rol']; ?></span>
						</div>
					</div>
				</div>
				<div class="last">
					
  <div class="body">


    <?php if ($_SESSION['user_rol'] === 'student') { ?>
     <form name="form-update-students" action="update.php" method="POST" autocomplete="off" autocapitalize="on">			
			<div class="wrap">
				<div class="section-user-info">
							<h1 class="titulo">Perfil</h1>
						</div>
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['student_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['student_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />
					<label for="txtuseremail" class="label">Correo</label>
                    <input id="txtuseremail" class="text" type="email" name="txtemailupdate" value="<?php echo $_SESSION['student_email']; ?>" placeholder="ejemplo@email.com" maxlength="200" autofocus/>
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="date" name="dateofbirth" value="<?php echo $_SESSION['student_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectsede" class="label">Sede</label>
					<select id="selectsede" class="select" name="selectSede" required>
						<?php
						if ($_SESSION['student_sede'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						} elseif ($_SESSION['student_sede'] == 'matriz') {
							echo '
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						} elseif ($_SESSION['student_sede'] == 'latacunga') {
							echo '
								<option value="latacunga">Latacunga</option>
								<option value="matriz">Matriz</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						}  elseif ($_SESSION['student_sede'] == 'stodomingo') {
							echo '
								<option value="stodomingo">Sto. Domingo</option>								
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
							';
						}
						?>
					</select>

					<label for="selectuserdocumentation" class="label">Documentación</label>
					<select id="selectuserdocumentation" class="select" name="selectDocumentation" disabled>
						<?php
						if ($_SESSION['student_documentation'] == '') {
							echo '
								<option value="">Seleccioné</option>
								<option value="REPROBADO">REPROBADO</option>
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="APROBADO">APROBADO</option>
							';
						} else if ($_SESSION['student_documentation'] == 'REPROBADO') {
							echo
							'
								<option value="REPROBADO">REPROBADO</option>
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="APROBADO">APROBADO</option>
							';
						} elseif ($_SESSION['student_documentation'] == 'EN PROCESO') {
							echo
							'
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="REPROBADO">REPROBADO</option>
								<option value="APROBADO">APROBADO</option>
							';
						}elseif ($_SESSION['student_documentation'] == 'APROBADO') {
							echo
							'   <option value="APROBADO">APROBADO</option>
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="REPROBADO">REPROBADO</option>
							';
						}
						?>
					</select>

					<label for="selectuserestado" class="label">Estado</label>
					<select id="selectuserestado" class="select" name="selectEstado" disabled>
						<?php
						if($_SESSION['student_status']==''){
							echo'
							<option value="">Seleccione</option>
							<option value="activo">Activo</option>
							<option value="en_proceso">En proceso</option>
							<option value="finalizado">Finalizado</option>
							';
						} 
						elseif ($_SESSION['student_status']=='activo') {
							echo'
							<option value="activo">Activo</option>
							<option value="en_proceso">En proceso</option>
							<option value="finalizado">Finalizado</option>
							';
						}
						elseif ($_SESSION['student_status']=='en_proceso') {
							echo'
							<option value="en_proceso">En proceso</option>
							<option value="activo">Activo</option>
							<option value="finalizado">Finalizado</option>
							';
						}
						elseif ($_SESSION['student_status']=='finalizado') {
							echo'
							<option value="finalizado">Finalizado</option>
							<option value="activo">Activo</option>
							<option value="en_proceso">En proceso</option>
							';
						}

						?>
					</select>



					<label class="label">Departamento</label>
					<input class="text" type="text" name="txtdepartamento" value="<?php echo $_SESSION['student_departamento']; ?>" disabled />
				</div>
				<div class="first">
					<label for="txtusercedula" class="label">Cédula</label>
					<input id="txtusercedula" class="text" type="text" name="txtcedula" value="<?php echo $_SESSION['student_cedula']; ?>" placeholder="Cédula de Identidad" pattern="[0-9]{10}" maxlength="10" required />
                    <label for="txtuserpass" class="label">Contraseña</label>
                    <input id="txtuserpass" class="text" type="text" name="txtpass" value="<?php echo $_SESSION ['student_pass']; ?>" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
					<label for="txtuserid" class="label">ID</label>
					<input id="txtuserid" class="text" type="text" name="txtid" value="<?php echo $_SESSION['student_id']; ?>" placeholder="L00XXXXXXX" pattern="[A-Za-z0-9]{9}" maxlength="9" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['student_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="09999XXXXX" maxlength="10" required />
					


	
					<label for="selectuserjerarquia" class="label">Jerarquia</label>
					<select id="selectuserjerarquia" class="select" name="selectJerarquia" disabled>
				
					<?php
						if ($_SESSION['student_jerarquia'] == 'LIDER') {
							echo '
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						} elseif ($_SESSION['student_jerarquia'] == 'COLIDER') {
							echo '
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						
						';
						} elseif ($_SESSION['student_jerarquia'] == 'APOYO1') {
							echo '
						<option value="APOYO1">APOYO 1</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						
						';
						} elseif ($_SESSION['student_jerarquia'] == 'APOYO2') {
							echo '
						<option value="APOYO2">APOYO 2</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						';
						}
						
						elseif ($_SESSION['student_jerarquia'] == 'APOYO3') {
							echo '
						<option value="APOYO3">APOYO 3</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO4') {
							echo '
						<option value="APOYO4">APOYO 4</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO5') {
							echo '
						<option value="APOYO5">APOYO 5</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						
						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO6') {
							echo '
						<option value="APOYO6">APOYO 6</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						
						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO7') {
							echo '
						<option value="APOYO7">APOYO 7</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO8">APOYO 8</option>
						
						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO8') {
							echo '
						<option value="APOYO8">APOYO 8</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						
						';
						}
						?>
					</select>

					<label for="selectuserjornada" class="label">Jornada</label>
                    <select id="selectuserjornada" class="select" name="selectJornada" disabled>
                        <?php
						if ($_SESSION['student_jornada'] == '') {
							echo '
						<option value="">Seleccione</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Otra">Otra</option>
						';
						} elseif ($_SESSION['student_jornada'] == 'Vespertino') {
							echo '
						<option value="Vespertino">Vespertino</option>
						<option value="Matutino">Matutino</option>
						<option value="Otra">Otra</option>
						';
						} elseif ($_SESSION['student_jornada'] == 'Matutino') {
							echo '
						<option value="Matutino">Matutino</option>
						<option value="Vespertino">Vespertino</option>	
						<option value="Otro">Otro</option>
						';
						} elseif ($_SESSION['student_jornada'] == 'Otro') {
							echo '
						<option value="Otro">Otro</option> 
						<option value="Matutino">Matutino</option>
						<option value="Vespertino">Vespertino</option>
						';
						}
						?>
                    </select>
					
					
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['student_address']; ?>" placeholder="Domicilio" maxlength="200" required />
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" disabled>
						<?php
						$career = $_SESSION['student_career'];

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
					<label for="dateuseradmission" class="label">Fecha de admisión</label>
					<input id="dateuseradmission" class="date" type="date" name="dateadmission" value="<?php echo $_SESSION['student_admission_date']; ?>" disabled />
				</div>
			<div class="last">
  <label class="label" for="txthours">
    <label for="txttotalhours_hidden" class="label" placeholder="Suma de las horas">Horas de Vinculación</label>
    <input class="text" type="text" name="txttotalhours_hidden" id="txttotalhours_hidden" style="height: 50px; width: 40px; font-size: 16px;" readonly wrap="soft"  value="<?php echo $_SESSION['student_horas']; ?>"disabled>
</div>
				
<div class="first">
    <label for="txtuserhours" class="label">Horarios Establecidos</label>
    <input id="txtuserhours" class="text" type="text" name="txtuserhours" placeholder="Seleccione el horario" maxlength="20000" style="height: 50px; width: 200px; font-size: 16px;" readonly wrap="soft" value="<?php echo $_SESSION['student_horario']; ?>" data-expandable disabled/>    
</div>

         <div class="first">
                    <label for="txtuserdates" class="label">Asistencia</label>
					<textarea id="txtuserdates" class="textarea" name="txtuserdates" placeholder="Seleccione fechas" style="height: 200px; width: 500px; font-size: 16px;" readonly wrap="soft" disabled><?php echo $_SESSION['student_asistencia']; ?></textarea>			
				</div>

			</div>			
		</form>
     






<?php } else if ($_SESSION['user_rol'] === 'teacher') { ?>
      <form name="form-update-teachers" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="section-user-info">
							<h1 class="titulo">Perfil</h1>
						</div>
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['teacher_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['teacher_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['teacher_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" required>
						<?php
						if ($_SESSION['teacher_gender'] == '') {
							echo '
								<option value="">SeleccionE</option>
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
					<label for="txtuseremail" class="label">Correo</label>
					<input id="txtuseremail" class="text" type="email" name="txtemail" value="<?php echo $_SESSION['teacher_email']; ?>" placeholder="ejemplo@email.com" maxlength="100" required />
				</div>
				<div class="first">
					<label for="txtusercedula" class="label">Cedula</label>
					<input id="txtusercedula" class="text" type="text" name="txtcedula" value="<?php echo $_SESSION['teacher_cedula']; ?>" placeholder="Cédula de Identidad" pattern="[0-9]{10}" maxlength="10" required />
					<label for="txtuserid" class="label">ID</label>
					<input id="txtuserid" class="text" type="text" name="txtid" value="<?php echo $_SESSION['teacher_id']; ?>" placeholder="L00XXXXXXX" pattern="[A-Za-z0-9]{9}" maxlength="9" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserpass" class="label">Contraseña</label>
                    <input id="txtuserpass" class="text" type="text" name="txtpass" value="<?php echo $_SESSION['teacher_pass']; ?>" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['teacher_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="09999XXXXX" maxlength="10" required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['teacher_address']; ?>" placeholder="Domicilio" maxlength="200" required />
					
					<label for="selectuserlevelstudies" class="label">Nivel de estudios</label>
					<select id="selectuserlevelstudies" class="select" name="selectlevelstudies" required>
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
				<div class="first">
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" required>
						<?php
						$_SESSION['teacher_career'] = trim($_SESSION['teacher_career'], ',');
						$careers = explode(',', $_SESSION['teacher_career']);

						$i = 0;

						$sql = "SELECT career, name FROM careers";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								if ($row['career'] == $careers[$i]) {
									echo
									'
										<option value="' . $row['career'] . '" selected>' . $row['name'] . '</option>
									';
									$i++;
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
		</form>
 



     <?php } else if ($_SESSION['user_rol'] === 'empre') { ?>
      <form name="form-update-emprendedor" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="section-user-info">
							<h1 class="titulo">Perfil</h1>
						</div>
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
				<div class="first">
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
		</form>

<?php } else if ($_SESSION['user_rol'] === 'admin') { ?>
      <form name="form-update-administratives" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="section-user-info">
							<h1 class="titulo">Perfil</h1>
						</div>
				<div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['administratives_name']; ?>" placeholder="Nombre" maxlength="30" required autofocus />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" placeholder="Apellidos" value="<?php echo $_SESSION['administratives_surnames']; ?>" maxlength="60" required />
                    <label for="txtid" class="label">ID</label>
                    <input id="txtid" class="text" type="text" name="txtid" value="<?php echo $_SESSION['administratives_id']; ?>" placeholder="L00124281" maxlength="16" required />
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
                <div class="first">
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
						$career = $_SESSION['administratives_carrera'];

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
                    <label for="txtemail" class="label">Email</label>
                    <input id="txtemail" class="text" type="text" name="txtemail" value="<?php echo $_SESSION['administratives_email']; ?>" placeholder="Correo electrónico" maxlength="60" required />
                </div>
			</div>			
		</form>

<?php } else if ($_SESSION['user_rol'] === 'editor') { ?>
      <form name="form-update-users" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="section-user-info">
							<h1 class="titulo">Perfil</h1>
						</div>
				<div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['user_name']; ?>" placeholder="Nombre" maxlength="30" required autofocus />                    
                   </div>
                <div class="first">                    
                    <label for="txtuserpass" class="label">Contraseña</label>
                    <input id="txtuserpass" class="text" type="text" name="txtpass" value="<?php echo $_SESSION ['user_pass']; ?>" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" placeholder="Apellidos" value="<?php echo $_SESSION['user_surnames']; ?>" maxlength="60" required />
                </div>
                <div class="first">                    
                    <label for="txtemail" class="label">Email</label>
                    <input id="txtemail" class="text" type="text" name="txtemail" value="<?php echo $_SESSION['user_email']; ?>" placeholder="Correo electrónico" maxlength="60" required />
                </div>
            </div>			
		</form>

      <?php } ?>						
					
						<button id="btnSave" class="btn icon" type="submit">save</button>
					</div>
				</div>
				<label class="label">Debes volver a iniciar sesión para ver los cambios reflejados</label>
				 <div class="footer">					
					<span class="user-permissions"><?php echo $_SESSION['user_type']; ?> </span>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
include_once '../modules/notif_info.php';
?>