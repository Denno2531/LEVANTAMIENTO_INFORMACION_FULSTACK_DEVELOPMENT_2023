<?php
function Error($textMsgBox)
{
    $_SESSION['msgbox_info'] = 0;
    $_SESSION['msgbox_error'] = 1;
    $_SESSION['text_msgbox_error'] = $textMsgBox;
}

function Info($textMsgBox)
{
    $_SESSION['msgbox_error'] = 0;
    $_SESSION['msgbox_info'] = 1;
    $_SESSION['text_msgbox_info'] = $textMsgBox;
}







# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

