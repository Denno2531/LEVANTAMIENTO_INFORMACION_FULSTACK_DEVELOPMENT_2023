<?php
// Incluye el archivo que verifica el acceso de roles de administrador y editor
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

// Obtiene los datos del formulario
$name = $_POST['txtname'];
$id = $_POST['txtuserid'];

// Consulta SQL para obtener la información del estudiante
$sql = "SELECT students.*, careers.name AS career_name, users.image AS user_image , department.name AS user_department
FROM students
INNER JOIN careers ON students.career = careers.career
INNER JOIN users ON students.user = users.user
INNER JOIN department ON department.id_department = students.departamento 
WHERE students.user ='" . $id. "'";

// Ejecuta la consulta SQL
if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    // Almacena los datos del estudiante en variables de sesión
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

<!-- Sección de contenido lateral -->
<div class="content-aside">
  <?php
  // Incluye archivos de información y opciones
  include_once '../notif_info.php';
  include_once "../sections/options.php";
  ?>
</div>

<!-- Sección principal con la información del estudiante -->
<div class="form-gridview">
  <h2 class="title-info">Información del Estudiante</h2>
  <div class="contenedor-info">
      <?php
      // Imprime el nombre del estudiante
      echo '<h2 class="information_student"> ' . $_POST['txtname'] . ' </h2>';
      ?>
      <div class="info-student">
        <div class="user">
        <a href="/images/users/<?php echo $_SESSION['user_foto']; ?>" download title="Haz clic para descargar la imagen">
            <img class="image_user" src="/images/users/<?php echo $_SESSION['user_foto']; ?>" />
          </a>
        </div>
      </div>
      <!-- Muestra la jerarquía, departamento y otros detalles del estudiante -->
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

<!-- Sección de opciones adicionales -->
<div class="form-gridview">
  <table class="default">
    <div class="textList">
      <!-- Opciones para ver informes quincenales, envío 1 y envío 2 -->
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

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
	// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 202450
	// Betty Lizeth Rodriguez Salas[SaoriCoder]
  //Angelus Infernus
	# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>