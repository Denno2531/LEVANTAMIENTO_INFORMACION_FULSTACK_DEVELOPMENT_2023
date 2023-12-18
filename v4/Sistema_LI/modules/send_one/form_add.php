<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
    }
}
		
function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}


$id_generate = 'S-' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form  action="insert.php" method="post" autocomplete="off" autocapitalize="on" enctype="multipart/form-data">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" style="display: none;" type="text" name="userid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
                    <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                </div>
                <div class="first">
                    <label for="txtusernum" class="label">N°PDF</label>
                    <input id="txtusernum" class="text" style=" display: none;" type="text" name="num" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />     
                </div>
                <div class="description">
                    <label for="txtinfoqdescription" class="label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="textarea" cols="30" rows="10" readonly>Documentación</textarea>
                </div>
                <div>
                    <label for="txtusernum" class="label">Cargar Archivo</label>
                    <input type="file" class="update-file" id="archivo" name="archivo" accept=".pdf, .doc, .docx" required>
                </div>
            </div>
            
            <button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>


