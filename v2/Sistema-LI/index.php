<?php
session_start();

header('Content-Type: text/html; charset=UTF-8');

include_once 'modules/conexion.php';
include_once 'modules/cookie.php';


if (!empty($_SESSION['authenticate']) == 'go-' . !empty($_SESSION['usuario'])) {
	header('Location: home');
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<meta name="google" value="notranslate">
	<link rel="icon" type="image/png" href="/images/icon.png" />
	<title>Levantamiento de Información</title>
	<meta name="description" content="Sistema de Levantamiento de Información, Prowess ec." />
	<meta name="keywords" content="Levantamiento de Información, Asistencias, Alumnos, Docentes, Administrativos, Sistema de Asistencias, MySoftUP, Michael, Andres, Espinosa, Michael Andres Espinosa, Levantamiento de Información" />
	<link rel="stylesheet" href="/css/style.css?v=<?php echo(rand()); ?>" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="css/pretty-checkbox.css" media="screen, projection" type="text/css" />
	<script src="/js/external/jquery.min.js" type="text/javascript"></script>
    <script src="/js/external/prefixfree.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$(".loader").fadeOut("slow");
		});
	</script>
	<script>
function mostrarRecuperacion() {
  alert('Para recuperar tu contraseña, contacta al administrador');
}
</script>
</head>

<body class="login">
	<div class="loader"></div>
	<div class="wrap-title-login">
		<div class="title-login">
			<h1>Levantamiento de Información</h1>
		</div>
	</div>
	<div class="form-login">
		<div class="logo-form-login">
		</div>
		<form name="form-login" action="" method="POST" autocapitalize="off" data-nosnippet>
			<?php
			include_once 'modules/login/logger.php';
			?>
		</form>
	</div>
</body>
<script src="/js/controls/buttons.js" type="text/javascript"></script>

</html>