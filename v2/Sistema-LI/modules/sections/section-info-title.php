<?php
include_once 'security.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');


$url_actual = $_SERVER["REQUEST_URI"];

if (strpos($url_actual, 'modules')) {
    $input = $url_actual;
    preg_match('~modules/(.*?)/~', $input, $name_page);
    $name_page[1];

    if ($name_page[1] == 'school_periods') {
        $_SESSION['title_form_section'] = 'Periodo Escolar';
    } elseif ($name_page[1] == 'school_period') {
        $_SESSION['title_form_section'] = 'Periodo Escolar';
    } elseif ($name_page[1] == 'users') {
        $_SESSION['title_form_section'] = 'Usuarios';
    } elseif ($name_page[1] == 'administratives') {
        $_SESSION['title_form_section'] = 'Administrativos';
    } elseif ($name_page[1] == 'teachers') {
        $_SESSION['title_form_section'] = 'Docentes';
    } elseif ($name_page[1] == 'students') {
        $_SESSION['title_form_section'] = 'Alumnos';
    } elseif ($name_page[1] == 'subjects') {
        $_SESSION['title_form_section'] = 'Asignaturas';
    } elseif ($name_page[1] == 'careers') {
        $_SESSION['title_form_section'] = 'Carreras';
    } elseif ($name_page[1] == 'emprendedor') {
        $_SESSION['title_form_section'] = 'Emprendedor';
    }

} elseif (strpos($url_actual, 'user')) {
    $name_page[1] = 'user';

    if ($name_page[1] == 'user') {
        $_SESSION['title_form_section'] = 'Configuración';
    }
} else {
    $name_page[1] = 'home';

    if ($name_page[1] == 'home') {
        $_SESSION['title_form_section'] = 'Inicio';
    }
}
?>
<div class="info-title">
    <span class="title">
        <?php
        echo $_SESSION['title_form_section'];
        ?>
    </span>
</div>
<div class="info-school-period">
    <span class="school-period">        
        <a  href="https://prowessec.com/" target="_blank">PROWESS.EC</a>
    </span>
</div>

<div >
    <div style="text-align:center; margin: 120px 0;">             
        <h1>Bienvenido a la plataforma de</h1>
        <h1>Levantamiento de Información</h1>
        <br>
        <img src="../images/acnur_logo.png" style="align-content: center;" />
    </div>

</div>