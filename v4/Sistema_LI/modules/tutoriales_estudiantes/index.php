<?php
include_once '../security.php';
include_once '../conexion.php';

header('Content-Type: text/html; charset=UTF-8');
header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');



?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<meta name="robots" content="noindex">
	<meta name="google" value="notranslate">
	<link rel="icon" type="image/png" href="/images/icon.png" />
	<title>Alumnos | Levantamiento Información</title>
	<meta name="description" content="Prowess ec | Levantamiento de Información." />
	<link rel="stylesheet" href="/css/style.css?v=<?php echo (rand()); ?>" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/select2.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/litepicker.css" media="screen, projection" type="text/css" />
	<script src="/js/external/jquery.min.js" type="text/javascript"></script>
	<script src="/js/external/litepicker.js" type="text/javascript"></script>
	<script src="/js/external/prefixfree.min.js" type="text/javascript"></script>
	<script src="/js/controls/unsetnotif.js" type="text/javascript"></script>
	<script src="/js/external/select2.js" type="text/javascript"></script>
	<script src="/js/logout2.js"></script>

	<script type="text/javascript">
		$(window).load(function () {
			$(".loader").fadeOut("slow");
		});
	</script>
	<script>
         $( document ).ready(function() {
             if (localStorage.getItem("pageloadcount")) { $("#landContainer").hide();
         } 
             localStorage.setItem("pageloadcount", "1");
         });
    </script>
    
    <style>
        video {
            background-color: #333;
            color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>

<body>
	<div class="loader"></div>
	<header class="header">
		<?php
		include_once "../sections/section-info-title.php";
		?>
	</header>
	<aside>
		<?php
		if (!empty($_SESSION['section-admin']) == 'go-' . $_SESSION['user']) {
			include_once '../sections/section-admin.php';
		} elseif (!empty($_SESSION['section-editor']) == 'go-' . $_SESSION['user']) {
			include_once '../sections/section-editor.php';
		} elseif (!empty($_SESSION['section-student']) == 'go-' . $_SESSION['user']) {
			include_once '../sections/section-student.php';
		}
		?>
	</aside>
	
	<section class="content-xl">
        <div class="container-tutorial">
            <h2>Subir Archivos </h2>

            <h3>Subida de Archivos en Informes Quincenales </h3>
			<div class="video-container">				
                <video width="640" height="360" controls>
                    <source src="InformesQuincenales.mp4" type="video/mp4">
                </video>
			</div></br>
			<h3>Subida de Archivos en Envío 1</h3>
			<div class="video-container">
			
			</div></br>
			
            <h3>Subida de Archivos en Envío 2</h3>
            <div class="video-container">
			
			</div></br>
        </div>
    </section>
</body>
<script src="/js/controls/buttons.js" type="text/javascript"></script>

</html>