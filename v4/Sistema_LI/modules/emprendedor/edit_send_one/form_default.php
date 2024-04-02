<!-- Este programa muestra información de estudiantes y notificaciones, con la capacidad 
de ver detalles de un estudiante y cerrar notificaciones no deseadas. -->

<?php
	require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');


	$sql_cont="SELECT COUNT(user) as total FROM notify WHERE estado='revisar'";
	if ($result_not = $conexion->query($sql_cont)) {
		if ($row = mysqli_fetch_array($result_not)) {
		$_SESSION['total_not'] = $row['total'];
		}
	}


	$sql="SELECT * FROM notify WHERE estado='revisar'";
		if ($result = $conexion->query($sql)) {
			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['usuario'] = $row['user'];
				$_SESSION['nombre'] = $row['name'];
				$_SESSION['mesage'] = $row['mensaje'];
				$_SESSION['pdf'] = $row['nombrepdf'];
				$_SESSION['state'] = $row['estado'];
				$i += 1;
			}
		}
		
	
?>

<div class="form-gridview">

	<h2 class="textList">Listado</h2>
	<table class="default">
	<?php
			if ($_SESSION['total_users'] != 0) {
				echo '
						<tr>
						<th class="center">Nombre</th>
							<th>Cédula</th>
							<th class="center">ID</th>
							<th>Carrera</th>
							<th class="center" style="width: 90px;">Fecha de Admisión</th>
							<th class="center" style="width: 100px;">Fecha de Salida</th>
							<th class="center"><a class="icon">visibility</a></th>
							
				';
			
			}
			for ($i = 0; $i < min(8, $_SESSION['total_users']); $i++) {
				echo '
						<tr>
							
							<td>' . $_SESSION["student_name"][$i] . '</td>
							<td class="tdbreakw">' . $_SESSION["student_cedula"][$i] . '</td>
							<td class="center">' . $_SESSION["student_id"][$i] . '</td>
							<td class="center">' . $_SESSION["student_career"][$i] . '</td>
							<td class="center">' . $_SESSION["student_date"][$i] . '</td>
							<td class="center">' . $_SESSION["student_finish"][$i] . '</td>
							<td>
								<form action="" method="POST">
									<input style="display:none;" type="text" id="texuserid" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
									<input style="display:none;" type="text" id="txtname" name="txtname" value="' . $_SESSION["student_name"][$i] . '"/>
									<button class="btnview" name="btn" value="menu" type="submit"></button>
								</form>
							</td>
						</tr>
					';
			}
	?>
		</table>
		<?php
		if ($_SESSION['total_users'] == 0) {
			echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
			';
		}

		if ($_SESSION['total_users'] != 0) {
			echo '
				<div class="pages">
					<ul>
			';
			
			// Botón de flecha izquierda si no está en la primera página
			if ($page > 1) {
				echo '<li class="arrow-button"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . ($page - 1) . '">&larr;</button></form></li>';
			}

			// Limita la cantidad de páginas visibles a la vez
			$maxVisiblePages = 5;
			$startPage = max(1, $page - floor($maxVisiblePages / 2));
			$endPage = min($startPage + $maxVisiblePages - 1, $tpages);

			// Crea botones para las páginas dentro del rango visible
			for ($n = $startPage; $n <= $endPage; $n++) {
				if ($page == $n) {
					echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				} else {
					echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				}
			}
			
			// Botón de flecha derecha si no está en la última página
			if ($page < $tpages) {
				echo '<li class="arrow-button"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . ($page + 1) . '">&rarr;</button></form></li>';
			}
			
			echo '
					</ul>
				</div>
			';
		}
		?>

</div>
<div class="content-aside">
	<?php
		include_once '../notif_info.php';
		include_once "../sections/options.php";
	?>
</div>

<!-- Muestra Notificaciones -->
<div class="content-aside">
    <?php
    // Invertir el bucle para mostrar las notificaciones más recientes primero
    $start_index = max(0, $_SESSION['total_not'] - 75);
    for ($i = $_SESSION['total_not'] - 1; $i >= $start_index; $i--) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        echo '<div class="box-notification-doc">
            <div class="btn-modal">
                <form action="" method="post" class="close-notification-form">
                    <input type="hidden" name="notification_id" value="' . $row["nombrepdf"] . '">
                    <button class="close-button" type="submit" name="close_notification">X</button>
                </form>
            </div> 
            <p>' . $row["name"] . ', ' . $row["mensaje"] . ' ' . $row["nombrepdf"] . '</p>
        </div>';
    }
    ?>
</div>

<script>
    // JavaScript para eliminar la notificación sin recargar la página
	// Borra de la interfaz - Se borra de la base de datos en segundo plano.
    document.querySelectorAll('.close-notification-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);
        fetch('', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Verificar si la eliminación en la base de datos fue exitosa
                // antes de eliminar la notificación del DOM
                return response.text(); // Leer la respuesta del servidor
            } else {
                throw new Error('La eliminación de la notificación falló');
            }
        })
        .then(data => {
            // Eliminar la notificación del DOM después de confirmar que la eliminación en la base de datos fue exitosa
            form.closest('.box-notification-doc').remove();
        })
        .catch(error => console.error(error));
    });
});
</script>

<?php
// Cierra/elimina notificaciones mostradas anteriormente
if (isset($_POST['close_notification'])) {
    // Obtén el ID de la notificación desde el formulario
    $notification_id = $_POST['notification_id'];

    // Ejecuta la consulta SQL para eliminar la notificación de la base de datos
    $sql_delete = "DELETE FROM notify WHERE nombrepdf = '$notification_id'";

    // Ejecuta la consulta de eliminación
    if ($conexion->query($sql_delete)) {
        // Respondemos con un código HTTP 200 OK para indicar que la operación fue exitosa
        http_response_code(200);
        exit(); // Termina la ejecución del script PHP después de eliminar la notificación
    } else {
        // Si hay un error en la consulta SQL, respondemos con un código de error
        http_response_code(500);
        exit();
    }
}
?>
