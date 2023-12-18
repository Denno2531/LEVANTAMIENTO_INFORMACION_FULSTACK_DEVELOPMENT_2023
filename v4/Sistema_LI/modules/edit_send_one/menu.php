<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$name = $_POST['txtname'];
$id = $_POST['txtuserid'];

$sql = "SELECT students.*, careers.name AS career_name, users.image AS user_image , department.name AS user_department
FROM students
INNER JOIN careers ON students.career = careers.career
INNER JOIN users ON students.user = users.user
INNER JOIN department ON department.id_department = students.departamento 
WHERE students.user ='" . $id. "'";

if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_foto'] = $row['user_image'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_cedula'] = $row['cedula'];
    $_SESSION['user_carrera'] = $row['career_name'];
    $_SESSION['user_sede'] = $row['sede'];
    $_SESSION['user_departamento'] = $row['user_department'];
    $_SESSION['user_telefono'] = $row['phone'];
    $_SESSION['user_jerarquia'] = $row['jerarquia'];
    $_SESSION['user_ingreso'] = $row['admission_date'];
    $_SESSION['user_salida'] = $row['finish_date'];
  }
}

?>

<div class="content-aside">
  <?php
  include_once '../notif_info.php';
  include_once "../sections/options.php";
  ?>
</div>
<div class="form-gridview">
  <h2 class="title-info">Información del Estudiante</h2>
  <div class="contenedor-info">
      <?php
      echo '<h2 class="information_student"> ' . $_POST['txtname'] . ' </h2>';
      ?>
      <div class="info-student">
        <div class="user">
        <a href="/images/users/<?php echo $_SESSION['user_foto']; ?>" download title="Haz clic para descargar la imagen">
            <img class="image_user" src="/images/users/<?php echo $_SESSION['user_foto']; ?>" />
          </a>
        </div>
      </div>
      <h2 class="information_student">Jerarquía: <?php echo $_SESSION['user_jerarquia']; ?></h2>
      <h2 class="information_student">Departamento: <?php echo $_SESSION['user_departamento']; ?></h2>
      <h2 class="information_student">Id: <?php echo $_SESSION['user_id']; ?></h2> 
      <h2 class="information_student">Cédula: <?php echo $_SESSION['user_cedula']; ?></h2>
      <h2 class="information_student">Carrera: <?php echo $_SESSION['user_carrera']; ?></h2>
      <h2 class="information_student">Sede: <?php echo $_SESSION['user_sede']; ?></h2>
      <h2 class="information_student">Teléfono: <?php echo $_SESSION['user_telefono']; ?></h2>
      <h2 class="information_student">Fecha de ingreso: <?php echo $_SESSION['user_ingreso']; ?></h2>
      <h2 class="information_student">Fecha tentativa de salida: <?php echo $_SESSION['user_salida']; ?></h2>
      
  </div>
</div>
<div class="form-gridview">
  <table class="default">
    <div class="textList">
      <div class="item downLeft rounded-blue-box">
        <h2>Justificaciones</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_justificaciones" name="btn" type="submit">Ver</button>
        </form>
      </div>
      <div class="item downLeft rounded-blue-box">
        <h2>Informes Quincenales</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_infoq" name="btn" type="submit">Ver</button>
        </form>
      </div>

      <div class="item downLeft rounded-blue-box">
        <h2 >Envío 1</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_documents" name="btn" type="submit">Ver</button>
        </form>
      </div>
      <div class="item downLeft rounded-blue-box">
        <h2 >Envío 2</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_sendtwo" name="btn" type="submit">Ver</button>
        </form>
      </div>
    </div>
  </table>  
</div>