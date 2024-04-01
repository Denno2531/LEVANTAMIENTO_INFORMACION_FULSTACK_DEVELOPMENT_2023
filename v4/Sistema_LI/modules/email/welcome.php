<?php
include_once '../notif_info_msgbox.php';
$id = $_POST['txtuserid'];              //Capturando user para enviar por correo
$name = $_POST['txtname'];              //Capturando nombre del destinatario
$pass = $_POST['txtpass'];                 //Capturando pass para enviar por correo
$email = $_POST['txtuseremail'];
?>
<html>

<body>

    Welcome <?php echo $_POST["txtname"]; ?><br>
    Your email address is: <?php echo $email; ?>
    <?php
    if (empty($email)) {
        echo "error en direccion";
    } else {
        echo "exito";
        Info("Mensaje Enviado");
        include_once '../email/mail.php';
        $_POST['txtuseremail'] = array();
        header('Location: ../email');
        exit();
    }
    ?>

</body>

</html>
<!-- 
    # ⚠⚠⚠ LEA CON CUIDADO ⚠⚠⚠

// ARCHIVO NECESARIO PARA HAMBIENTE DE PRUEBAS - NO ELIMINAR.

// © ANGELUS INFERNUS - FOR SAORI CODER

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
-->