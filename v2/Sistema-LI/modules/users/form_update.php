<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (isset($_POST['id'])) {
	$_SESSION['POST_id'] = $_POST['id'];
}

$sql = "SELECT user, name, surnames, pass, email, permissions, rol, image FROM users WHERE user = '" . $_SESSION['POST_id'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['user_name'] = $row['name'];
		$_SESSION['user_surnames'] = $row['surnames'];
		$_SESSION['user_pass'] = $row['pass'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['user_type'] = $row['permissions'];
		$_SESSION['user_rol'] = $row['rol'];
		$_SESSION['user_image'] = $row['image'];

	


		if($_SESSION['user_image'] == null) {
			$_SESSION['user_image'] = 'user.png';
		}

		if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'editor'|| $_SESSION['user_type'] == 'student'|| $_SESSION['user_type'] == 'teacher'|| $_SESSION['user_type'] == 'empre') {
			$sql = "SELECT name, surnames,pass FROM users WHERE user = '" . $_SESSION['user_id'] . "'";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['user_name'] = $row['name'];
					$_SESSION['user_surnames'] = $row['surnames'];
					$_SESSION['user_pass'] = $row['pass'];
				}
			}
		}
	}
}

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'] . '';

if (!file_exists($name_image_user)) {
	$sql = "SELECT image FROM users WHERE user = '" . $_SESSION['user_id'] . "'";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_image'] = $row['image'];
		}

		$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'] . '';

		if (file_exists($name_image_user)) {
		} else {
			$_SESSION['user_image'] = 'user.png';
		}
	}
}
echo '
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
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div class="section-user-image">
					<img src="' . '/images/users/' . $_SESSION['user_image'] . '" />
					<a href="#" class="file"><span class="icon">add_a_photo</span></a>
					<input id="fileuploadimage" style="display: none;" type="file" name="fileuploadimage" accept=".jpg, .jpeg, .png" />
				</div>

				
				<div class="section-user-info">
					<span class="user_name">' . $_SESSION['user_name'] . ' ' . $_SESSION['user_surnames'] . '</span>
					<br>
					<span class="user_id">' . $_SESSION['user_id'] . '</span>
				</div>


				<div class="first">
					<label for="txtuseremail" class="label">Email</label>
					<input id="txtuseremail" class="text" type="email" name="txtemailupdate" value="' . $_SESSION['email'] . '" placeholder="example@email.com" maxlength="200" autofocus disabled/>
					<label for="txtuserpass" class="label">Password</label>
					<input id="txtuseremail" class="text" type="text" name="txtpassupdate" value="' . $_SESSION['user_pass'] . '" placeholder="********" maxlength="200" autofocus disabled/>

				</div>
				<div class="last">
					<label for="selectusertype" class="label">Permisos</label>
					<select id="selectusertype" class="select" name="txtusertype" disabled>
					';
if ($_SESSION['user_type'] == '') {
	echo
	'
								<option value="">Seleccione</option>
								<option value="admin">Administrador</option>
								<option value="editor">Editor</option>								
	';
}
if ($_SESSION['user_type'] == 'admin') {
	echo
	'
								<option value="admin">Administrador</option>
								<option value="editor">Editor</option>	
							';
} elseif ($_SESSION['user_type'] == 'editor') {
	echo
	'
								<option value="editor">Editor</option>
								<option value="admin">Administrador</option>									
							';
}
echo
'

</select>

					<label for="selectuserrol" class="label">Rol</label>
					<select id="selectuserrol" class="select" name="txtuserrol" disabled>
					';
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
								<option value="editor">Editor</option>
								<option value="student">Student</option>
								<option value="teacher">Teacher</option>
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
echo
'
					</select>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';
