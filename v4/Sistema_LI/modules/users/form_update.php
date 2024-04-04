<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (isset($_POST['id'])) {
	$_SESSION['POST_id'] = $_POST['id'];
}

$sql = "SELECT user, name, surnames, pass, email, permissions, rol, image FROM users WHERE user = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $_SESSION['POST_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $_SESSION['user_id'] = $row['user'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_surnames'] = $row['surnames'];
    $_SESSION['user_pass'] = $row['pass'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_type'] = $row['permissions'];
    $_SESSION['user_rol'] = $row['rol'];
    $_SESSION['user_image'] = $row['image'];

    if ($_SESSION['user_image'] == null) {
        $_SESSION['user_image'] = 'user.png';
    }

    if (in_array($_SESSION['user_type'], ['admin', 'editor', 'student', 'teacher', 'empre'])) {
        $sql = "SELECT name, surnames, pass FROM users WHERE user = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_surnames'] = $row['surnames'];
            $_SESSION['user_pass'] = $row['pass'];
        }
    }
}

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'];

if (!file_exists($name_image_user)) {
    $sql = "SELECT image FROM users WHERE user = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $_SESSION['user_image'] = $row['image'];
    }

    $name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'];

    if (!file_exists($name_image_user)) {
        $_SESSION['user_image'] = 'user.png';
    }
}
?>

<header>
	<style>
		.section-user-info {
			user-select: text;
		}
	</style>
</header>

<div class="form-data form-users">
	<div class="loader-user">
	</div>
	<div class="body">
		<div class="section-croppie-image" style="display: none;">
			<div class="image-crop"></div>
			<div class="options">
				<a href="#" class="change-btn"><span class="icon">sync</span></a>
				<a href="#" class="crop-btn"><span class="icon">crop</span></a>
				<a href="#" class="cancel-btn"><span class="icon">close</span></a>
			</div>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="section-user-image">
					<img src="/images/users/<?php echo $_SESSION['user_image']; ?>" />
					<a href="#" class="file"><span class="icon">add_a_photo</span></a>
					<input id="fileuploadimage" style="display: none;" type="file" name="fileuploadimage" accept=".jpg, .jpeg, .png" />
				</div>

				<div class="section-user-info">
					<span class="user_name"><?php echo $_SESSION['user_name'] . ' ' . $_SESSION['user_surnames']; ?></span>
					<br>
					<span class="user_id"><?php echo $_SESSION['user_id']; ?></span>
				</div>


				<div class="first">
					<input type="hidden" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>">

					<label for="txtusername" class="label">Nombres</label>
					<input id="txtusername" class="text" type="text" name="txtnameupdate" value="<?php echo $_SESSION['user_name']?> " placeholder="Nombre" autofocus maxlength="30" required/>
					
					<label for="txtusersurname" class="label">Apellidos</label>
					<input id="txtusersurname" class="text" type="text" name="txtsurnameupdate" value="<?php echo $_SESSION['user_surnames']?>" placeholder="Apellidos" maxlength="60"	required/>

					<label for="txtuseremail" class="label">Email</label>
					<input id="txtuseremail" class="text" type="email" name="txtemailupdate" value=" <?php echo $_SESSION['email']?>" placeholder="example@email.com" maxlength="75" autofocus />
										
				</div>
				<div class="last">

					<label for="txtuserpass" class="label">Password</label>
					<input id="txtuserpass" class="text" type="text" name="txtpassupdate" placeholder="********" pattern="[A-Za-z0-9]+" maxlength="10" />
					
					<label for="selectusertype" class="label">Permisos</label>
					<select id="selectusertype" class="select" name="txtusertype" >
						<?php if ($_SESSION['user_type'] == '') : ?>
							<option value="">Seleccione</option>
							<option value="admin">Administrador</option>
							<option value="editor">Editor</option>
						<?php elseif ($_SESSION['user_type'] == 'admin') : ?>
							<option value="admin">Administrador</option>
							<option value="editor">Editor</option>
						<?php elseif ($_SESSION['user_type'] == 'editor') : ?>
							<option value="editor">Editor</option>
							<option value="admin">Administrador</option>
							<?php endif; ?>
					</select>

					<label for="selectuserrol" class="label">Rol</label>
					<select id="selectuserrol" class="select" name="txtuserrol" >
						<?php
						if ($_SESSION['user_rol'] == '') {
							echo
								'
									<option value="">Seleccione</option>
									<option value="admin">Administrador</option>
									<option value="editor">Editor</option>
									<option value="student">Student</option>
									<option value="teacher">Teacher</option>
									<option value="empre">Emprendedor</option>

								';
						}
						if ($_SESSION['user_rol'] == 'admin') {
							echo
							'
									<option value="admin">Administrador</option>
									<option value="teacher">Teacher</option>
									<option value="editor">Editor</option>
									<option value="student">Student</option>
									<option value="empre">Emprendedor</option>
								';
						} elseif ($_SESSION['user_rol'] == 'editor') {
							echo
							'
									<option value="editor">Editor</option>
									<option value="admin">Administrador</option>
									<option value="student">Student</option>
									<option value="teacher">Teacher</option>
									<option value="empre">Emprendedor</option>									
								';
						} elseif ($_SESSION['user_rol'] == 'student') {
							echo
							'
									<option value="student">Student</option>
									<option value="admin">Administrador</option>
									<option value="editor">Editor</option>								
									<option value="teacher">Teacher</option>
									<option value="empre">Emprendedor</option>
								';
						} elseif ($_SESSION['user_rol'] == 'teacher') {
							echo
							'
									<option value="teacher">Teacher</option>
									<option value="admin">Administrador</option>
									<option value="editor">Editor</option>	
									<option value="student">Student</option>								
									<option value="empre">Emprendedor</option>
								';
						} elseif ($_SESSION['user_rol'] == 'empre') {
							echo
							'
									<option value="empre">Emprendedor</option>
									<option value="admin">Administrador</option>
									<option value="editor">Editor</option>	
									<option value="student">Student</option>
									<option value="teacher">Teacher</option>								
								';
						}
						?>

					</select>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>

<div>
	<div class="content-aside">
		<?php include_once "../sections/options-disabled.php";?>
	</div>
</div>



<?php


# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>
