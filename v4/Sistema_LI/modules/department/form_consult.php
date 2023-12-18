<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['id_department'] = array();
$_SESSION['department_name'] = array();
$_SESSION['department_description'] = array();

$sql = "SELECT department.id_department, department.name AS department_name, department.description, teachers.name AS teacher_name, teachers.surnames AS teacher_surname
        FROM department 
        LEFT JOIN teachers ON department.teacher = teachers.user 
        WHERE department.id_department = '" . $_POST['txtcareer'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['id_department'][0] = $row['id_department'];
        $_SESSION['department_name'][0] = $row['department_name'];
        $_SESSION['department_description'][0] = $row['description'];

        if ($row['teacher_name'] && $row['teacher_surname']) {
            $_SESSION['teacher_name'][0] = $row['teacher_name'];
            $_SESSION['teacher_surname'][0] = $row['teacher_surname'];
        } else {
            $_SESSION['teacher_name'][0] = 'SIN TUTOR ASIGNADO';
            $_SESSION['teacher_surname'][0] = 'SIN TUTOR ASIGNADO';
        }
    }
}




echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
   <div class="body">
		<form name="form-consult-careers" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Departamento</label>
					<input style="display: none;" type="text" name="txtcareer" value="' . $_SESSION['id_department'][0] . '"/>
					<input class="text" type="text" name="txtcareer" value="' . $_SESSION['id_department'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtcareername" value="' . $_SESSION['department_name'][0] . '" required disabled/>
				</div>
				<div class="last">
					<label class="label">Tutor a cargo</label>
					<input class="text" type="text" name="txtcareername" value="' . $_SESSION['teacher_surname'][0] . ' ' . $_SESSION['teacher_name'][0] . '" required disabled/>
				</div>
				<div class="description">
					<label class="label">Descripción</label>
					<textarea disabled class="textarea" name="txtcareerdescription" data-expandable>' . $_SESSION['department_description'][0] . '</textarea>				
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/controls/dataexpandable.js"></script>
';



# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠


