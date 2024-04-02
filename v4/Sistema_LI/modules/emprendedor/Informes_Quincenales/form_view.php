<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM infoq WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['user'];
    $_SESSION['numero'] = $row['num'];
    $_SESSION['state'] = $row['estado'];
    $_SESSION['mensaje'] = $row['message'];
    $_SESSION['nombre'] = $row['archivopdf'];
    $_SESSION['evidencia'] = $row['evidencepdf'];
    $_SESSION['coment'] = $row['message_student'];
  }
}
$id = $_SESSION['user_id']; 
//obtenemos los comentarios del estudiante
$comenario_estudiante=$_SESSION['coment'];
// Obtén el nombre del archivo desde la base de datos o alguna otra fuente
$nombre_del_archivo = $_SESSION['evidencia'];
// Construye la URL completa al archivo PDF
$url_archivo_pdf = '/modules/edit_send_one/informesquincenalespdf/' . $id . '/' . $nombre_del_archivo;


?>
<div class="form-data">
  <div class="head">
    <h1 class="titulo">Formulario de documentación quincenal</h1>
  </div>
  <div class="body">
    <form name="form-update-students" action="update_view.php" method="POST" autocomplete="off" autocapitalize="on" enctype="multipart/form-data"> 
      <div class="subtitle">
        <h2>Datos Generales</h2>
      </div>
      <div class="wrap">
        <div class="first">
          <label for="txtuserid" class="label">Usuario</label>
          <input id="txtuserid" style="display: none;" type="text" name="userid"
            value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50"
            disabled />
        </div>
        <div class="first">
            <label for="txtestado" class="label">Estado</label>
            <input id="txtestado" class="text" style=" display: none;" type="text" name="txtestado"
            value="<?php echo $_SESSION['state']; ?>" maxlength="50" required />
            <input class="text" type="text" name="txtestado" value="<?php echo $_SESSION['state']; ?>" required readonly/>
          </div>
        <div class="description">    
            <label for="txtinfoqdescription" class="label">Comentario de documentación</label>
            <textarea name="descripcion" id="descripcion" class="textarea" cols="30" rows="10"
            value="<?php echo $_SESSION['user_id']; ?>" readonly><?php echo $_SESSION['mensaje']; ?></textarea>
        </div>
        <div class="first">
          <label for="txtname" class="label">Nombre</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="txtname"
            value="<?php echo $_SESSION['nombre']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txtname" value="<?php echo $_SESSION['nombre']; ?>" required disabled />
        </div>
        <div class="first">
          <label for="txtnum" class="label">N°PDF</label>
          <input id="txtnum" class="text" style=" display: none;" type="text" name="txtnum"
            value="<?php echo $_SESSION['numero']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txtnum" value="<?php echo $_SESSION['numero']; ?>" required disabled />
        </div>
        <div class="first">
          <label for="txtname" class="label">Evidencia</label>
          <input id="txtname" class="text" style="display: none;" type="text" name="txtevidencefile"
            value="<?php echo $_SESSION['evidencia']; ?>" maxlength="50" readonly />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['evidencia']; ?>" readonly />
        </div>

        <?php if (!empty($_SESSION['evidencia'])): ?>
          <div class="button-container">
            <div class="first">
              <a href="<?php echo $url_archivo_pdf; ?>" download class="btn-download">Descargar Documento</a>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <div class="subtitle">
        <h2>Actualizar documentación</h2>
      </div>
      <div class="wrap">
        <div class="description">
          <label for="txtcomentario" class="label">Comentarios del estudiante</label>
          <textarea name="comentario" id="comentario" class="textarea" cols="30" 
			      rows="10"><?php echo $comenario_estudiante; ?></textarea>
        </div>

        <div>
          <input type="file" class="update-file" id="archivo" name="archivo" accept=".pdf, .doc, .docx">
        </div>

      </div>

      <button id="btnSave" class="btn icon" name="btn" type="submit">save</button>

    </form>
  </div>
</div>
<div class="content-aside">
  <?php
  include_once "../sections/options-disabled.php";
  ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>