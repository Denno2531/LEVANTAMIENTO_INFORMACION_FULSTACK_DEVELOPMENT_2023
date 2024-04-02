<?php

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'stdt-' . unique_id(5);
?>

<!DOCTYPE HTML>
<html>

<body>

    <form action="../email/welcome.php" method="post">
        UserID: <input type="text" name="txtuserid" value="<?php echo $id_generate; ?>"><br>
        Name: <input type="text" name="txtname"><br>
        Pass: <input type="password" name="txtpass"><br>
        E-mail: <input type="text" name="txtuseremail"><br>
        <input type="submit">
    </form>

</body>

</html>
<!-- 
    # ⚠⚠⚠ LEA CON CUIDADO ⚠⚠⚠

// ARCHIVO NECESARIO PARA HAMBIENTE DE PRUEBAS - NO ELIMINAR.

// © ANGELUS INFERNUS - FOR SAORI CODER

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠
-->