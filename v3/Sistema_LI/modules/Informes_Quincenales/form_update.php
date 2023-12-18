<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM infoq WHERE num = '" . $_POST['txtnum'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
        $_SESSION['num'] = $row['num'];
        $_SESSION['infoq_description'] = $row['descripcion'];
        $_SESSION['infoq_archivo'] = $row['archivopdf'];
    }
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-students" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">	
                   <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                    <label for="txtnum" class="label">N°PDF</label>
					<input id="txtnum" style="display: none;" type="text" name="txtnum" value="<?php echo $_SESSION['num']; ?>" maxlength="50">
					<input class="text" type="text" name="txtnum" value="<?php echo $_SESSION['num']; ?>" maxlength="50" disabled />
                    <label for="txtinfoqdescription" class="label">Actualizar Descripción</label>
                    <input id="txtinfoqdescription" maxlength="2000" class="textarea" type="text" name="txtinfoqdescription" value="<?php echo $_SESSION['infoq_description']; ?>"/>                   
                    </div>
                    <div class="first">
                    <label for="txtuserarchivo" class="label">Actualizar Archivo</label>
                    <input id="txtuserarchivo" class="text" type="file" name="pdf_archivo" value="<?php echo $_SESSION['infoq_archivo']; ?>" accept="application/pdf" />
                   
                    </div>                  

			</div>
			
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>
<script>
if (isset($_POST['btnSave'])) {
    $user_id = $_POST['txtuserid'];
    $pdf_descripcion = $_POST['txtdescripcion'];
    $pdf_archivo = $_FILES['pdf_archivo']['name'];

    if (!empty($pdf_archivo)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pdf_archivo"]["name"]);
        move_uploaded_file($_FILES["pdf_archivo"]["tmp_name"], $target_file);
    }
}
</script>







