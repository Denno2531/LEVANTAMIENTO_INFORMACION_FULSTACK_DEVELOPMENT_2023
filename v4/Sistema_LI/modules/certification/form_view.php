<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$id = $_POST['txtuserid'];

$sql = "SELECT * FROM certification WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
      $_SESSION['user_id'] = $row['user'];
      $_SESSION['numero'] = $row['num'];
      $_SESSION['nombre'] = $row['archivopdf'];
      $_SESSION['evidencia'] = $row['evidencepdf'];
    }
  }
//obtenemos los comentarios del estudiante
$comenario_estudiante = $_SESSION['coment'];
// Obtén el nombre del archivo desde la base de datos o alguna otra fuente
$nombre_del_archivo = $_SESSION['evidencia'];
// Construye la URL completa al archivo PDF
$url_archivo_pdf = '/modules/edit_send_one/certificadopdf/' . $id . '/' . $nombre_del_archivo;

?> 


