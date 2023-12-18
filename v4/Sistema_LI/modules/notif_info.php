<?php
if (!empty($_SESSION['msgbox_info']) == 1) {
    echo '
            <div class="box-notification-ok">
                <p>' . $_SESSION['text_msgbox_info'] . '</p>
            </div>
        ';
}
if (!empty($_SESSION['msgbox_error']) == 1) {
    echo '
            <div class="box-notification-error">
                <p>' . $_SESSION['text_msgbox_error'] . '</p>
            </div>
        ';
}





# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

