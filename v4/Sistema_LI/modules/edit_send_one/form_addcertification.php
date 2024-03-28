<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'S-' . unique_id(5);
?>

<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar Certificado.</h1>
    </div>
    <div class="body">
    <form action="addcertification.php" method="POST" autocomplete="off" autocapitalize="on" enctype="multipart/form-data">
        <div class="wrap">
            <div class="first">
                <label for="txtuserid" class="label">ID del Estudiante</label>
                <input class="text" type="text" name="user_id" value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : ''; ?>">
            </div>

            <div class="first">
                <label for="txtusernum" class="label">N°PDF</label>
                <input id="txtusernum" class="text" style="display: none;" type="text" name="num" value="<?php echo $id_generate; ?>" maxlength="50" required>
                <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled>     
            </div>

            <div class="description">
                <label for="txtinfoqdescription" class="label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="textarea" cols="30" rows="10">Certificado de Vinculacion</textarea>
            </div>

            <div>
                <label for="txtusernum" class="label">Cargar Archivo</label>
                <input type="file" class="update-file" id="archivo" name="archivo" accept=".pdf, .doc, .docx">
            </div>
        </div>
        <button class="btn icon" type="submit">save</button>
    </form>
    </div>
</div>

<div class="content-aside">
    <?php
    include_once "../sections/options-editor.php";
    ?>
</div>
