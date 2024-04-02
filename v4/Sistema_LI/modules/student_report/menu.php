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
<div class="form-datos">
  <h2 class="title-info">Información del Estudiante</h2>
  <div class="contenedor-info">
      <?php
      echo '<h2 class="information_student"> ' . $_POST['txtname'] . ' </h2>';
      ?>
      <div class="info-student">
        <div class="user">
            <img class="image_user" src="/images/users/<?php echo $_SESSION['user_foto']; ?>" />
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

<?php
// INFORMES QUINCENALES
// Obtener los tipos de documentos posibles
$doctype_infoq =  ["Primer Informe Quincenal","Segundo Informe Quincenal","Tercer Informe Quincenal"];
            
// Obtener los documentos subidos por el estudiante
$sql_infoq_subidos = "SELECT doc_type, estado FROM infoq WHERE user ='" . $id. "' AND doc_type IS NOT NULL AND doc_type <> '' ";
$result_infoq_subidos = $conexion->query($sql_infoq_subidos);
$infoq_subidos = [];
while ($row = mysqli_fetch_assoc($result_infoq_subidos)) {
    $infoq_subidos[] = ['doc_type' => $row['doc_type'], 'estado' => $row['estado']];
}
            
// Calcular los documentos que faltan
$infoq_faltantes = array_diff($doctype_infoq, array_column($infoq_subidos, 'doc_type'));
// -------------------------------------------------------------------------------------------------------------------------------------   

// ENVIO 1
// Obtener los tipos de documentos posibles
$doctype_sendone = ["Acta Entrega","Acta Entrega-Recepcion","Record Academico"];

// Obtener los documentos subidos por el estudiante
$sql_sendone_subidos = "SELECT doc_type,estado FROM send_one WHERE user='" .$id. "' AND doc_type IS NOT NULL AND doc_type <> '' " ;
$result_sendone_subidos = $conexion->query($sql_sendone_subidos);
$sendone_subidos = [];
while ($row = mysqli_fetch_assoc($result_sendone_subidos)){
    $sendone_subidos[] = ['doc_type' => $row['doc_type'], 'estado' => $row['estado']];
}

    
// Calcular los documentos que faltan
$sendone_faltantes = array_diff($doctype_sendone, array_column($sendone_subidos, 'doc_type'));

// -------------------------------------------------------------------------------------------------------------------------------------   
// ENVIO 2
// Obtener los tipos de documentos posibles
$doctype_sendtwo = ["Informe Servicio Comunitario","Registro de estudiantes","Acta designacion estudiantes","Carta de compromiso","Numero de horas-estudiantes","Evaluacion estudiantes","Hoja de asistencia"];
            
// Obtener los documentos subidos por el estudiante
$sql_sendtwo_subidos = "SELECT doc_type,estado FROM send_two WHERE user ='" . $id. "' AND doc_type IS NOT NULL AND doc_type <> '' " ;
$result_sendtwo_subidos = $conexion->query($sql_sendtwo_subidos);
$sendtwo_subidos = [];
while ($row = mysqli_fetch_assoc($result_sendtwo_subidos)) {
    $sendtwo_subidos[] = ['doc_type' => $row['doc_type'], 'estado' => $row['estado']];
}
            
// Calcular los documentos que faltan
$sendtwo_faltantes = array_diff($doctype_sendtwo, array_column($sendtwo_subidos, 'doc_type'));
// -------------------------------------------------------------------------------------------------------------------------------------   
?>

<div class="form-datos">
    <div class="contenedor-report">
        <h4>Informes Quincenales</h4>
        <div class="columnas">
            <div class="columna">
                <h6>Documentos subidos:</h6>
                <ul>
                    <?php foreach ($infoq_subidos as $documento): ?>
                        <li> <?php echo $documento['doc_type']; ?> 
                            <?php if ($documento['estado'] == 'Aprobado'): ?> <i class="fas fa-check-circle" style="color: green;"></i>
                            <?php elseif ($documento['estado'] == 'En revisión'): ?> <i class="fas fa-clock" style="color: orange;"></i>
                            <?php elseif ($documento['estado'] == 'Rechazado'): ?> <i class="fas fa-times-circle" style="color: red;"></i>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="columna">
                <h6>Documentos faltantes:</h6>
                <ul>
                    <?php foreach ($infoq_faltantes as $documento): ?>
                        <li> <?php echo $documento; ?> <i class="fas fa-times-circle" style="color: red;"></i> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <hr> <!-- Línea horizontal -->
        <h4>Envío 1</h4>
        <div class="columnas">
            <div class= "columna">
                <h6>Documentos subidos:</h6>
                <ul>
                    <?php foreach ($sendone_subidos as $documento): ?>
                        <li> <?php echo $documento['doc_type']; ?>
                            <?php if ($documento['estado'] == 'Aprobado'): ?> <i class="fas fa-check-circle" style="color: green;"></i>
                            <?php elseif ($documento['estado'] == 'En revisión'): ?> <i class="fas fa-clock" style="color: orange;"></i>
                            <?php elseif ($documento['estado'] == 'Rechazado'): ?> <i class="fas fa-times-circle" style="color: red;"></i>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul> 
            </div>
            <div class= "columna"> 
                <h6>Documentos faltantes:</h6>
                <ul>
                    <?php foreach ($sendone_faltantes as $documento): ?>
                        <li> <?php echo $documento; ?> <i class="fas fa-times-circle" style="color: red;"></i> </li>
                    <?php endforeach; ?>
                </ul>
            </div> 
        </div>
        <hr> <!-- Línea horizontal --> 
         <h4>Envío 2</h4>
        <div class="columnas">
            <div class= "columna">
                <h6>Documentos subidos:</h6>
                <ul>
                    <?php foreach ($sendtwo_subidos as $documento): ?>
                        <li> <?php echo $documento['doc_type']; ?>
                            <?php if ($documento['estado'] == 'Aprobado'): ?> <i class="fas fa-check-circle" style="color: green;"></i>
                            <?php elseif ($documento['estado'] == 'En revisión'): ?> <i class="fas fa-clock" style="color: orange;"></i>
                            <?php elseif ($documento['estado'] == 'Rechazado'): ?> <i class="fas fa-times-circle" style="color: red;"></i>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>    
            </div>
            <div class= "columna"> 
                <h6>Documentos faltantes:</h6>
                <ul>
                    <?php foreach ($sendtwo_faltantes as $documento): ?>
                        <li> <?php echo $documento; ?> <i class="fas fa-times-circle" style="color: red;"></i></li>
                    <?php endforeach; ?>
                </ul>
            </div> 
        </div>
        <hr> <!-- Línea horizontal -->
        <p>
            Aprobado <i class="fas fa-check-circle" style="color: green;"></i>&ensp; &ensp;
            En revisión <i class="fas fa-clock" style="color: orange;"></i>&ensp; &ensp;
            Rechazado o falta por subir <i class="fas fa-times-circle" style="color: red;"></i>
        </p>
        
    </div>
</div>

<style>
    .columnas {
        display: flex;
        justify-content: space-between;
    }

    .columna {
        flex: 1;
        margin-right: 18px; /* Espacio entre las columnas */
    }

    /* Estilos para los iconos */
    .fas {
        margin-right: 5px; /* Espacio entre el icono y el texto */
    }
</style>

<!-- Incluir los iconos de Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">