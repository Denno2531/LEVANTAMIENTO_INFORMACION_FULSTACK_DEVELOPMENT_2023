<?php
include_once 'security.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['image'] . '';

if (file_exists($name_image_user)) {
} else {
    $sql = "SELECT image FROM users WHERE user = '" . $_SESSION['user'] . "'";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['image'] = $row['image'];
        }

        $name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['image'] . '';

        if (file_exists($name_image_user)) {
        } else {
            $_SESSION['image'] = 'user.png';
        }
    }
}

$url_actual = $_SERVER["REQUEST_URI"];

if (strpos($url_actual, 'modules')) {
    $input = $url_actual;
    preg_match('~modules/(.*?)/~', $input, $output);
    $output[1];
} elseif (strpos($url_actual, 'attendance')) {
    $input = $url_actual;
    preg_match('~/(.*?)/~', $input, $output);
    $output[1];
} elseif (strpos($url_actual, 'user')) {
    $input = $url_actual;
    preg_match('~/(.*?)/~', $input, $output);
    $output[1];
} else {
    $output[1] = 'home';
}
?>
<div class="nav-home">
    <span class="name_system">Levantamiento de Información</span>
    <div class="user">
        <img class="image_user" src="/images/users/<?php echo $_SESSION['image']; ?>" />
        <span class="name_user">
            <?php print $_SESSION['name'] . ' ' . $_SESSION['surnames']; ?>
        </span>
        <span class="logout_user">
            <a class="icon" href="#">expand_more</a>
            <ul>
                <li>
                    <a style="border-bottom: 3px solid #6272a4;" href="/user"><span class="icon">settings</span>Configuración</a>
                    <a href="/modules/logout"><span class="icon">logout</span>Cerrar Sesión</a>
                </li>
            </ul>
        </span>
    </div>
    <ul>
        <li><a class="<?php if ($output[1] == 'home') {
                            echo 'active';
                        } ?>" href="/home"><span class="icon">dashboard</span>Dashboard</a></li>        
        <!-- <li><a class="<?php if ($output[1] == 'careers') {
                            echo 'active';
                        } ?>" href="/modules/careers"><span class="icon">school</span>Carreras</a></li>
        <li><a class="<?php if ($output[1] == 'subjects') {
                            echo 'active';
                        } ?>" href="/modules/subjects"><span class="icon">library_books</span>Asignaturas</a></li> -->
          <li><a class="<?php if ($output[1] == 'edit_send_one') {
                            echo 'active';
                        } ?>" href="/modules/edit_send_one"><span class="icon">library_books</span>Documentación</a></li>  
  
        
        
</div>
<div class="menu-mobile">
    <header>
        <span class="activator icon" id="activator">menu</span>
        <nav>
            <ul>
                <li>
                    <a class="<?php if ($output[1] == 'home') {
                        echo 'active-menu';
                    } ?>" href="/home"><span class="icon">dashboard</span><span class="text">Dashboard</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'careers') {
                        echo 'active-menu';
                    } ?>" href="/modules/careers"><span class="icon">school</span><span
                            class="text">Carreras</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'subjects') {
                        echo 'active-menu';
                    } ?>" href="/modules/subjects"><span class="icon">library_books</span><span
                            class="text">Asignaturas</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'subjects') {
                        echo 'active-menu';
                    } ?>" href="/modules/edit_send_one"><span class="icon">library_books</span><span
                            class="text">Documentación</span></a>
                </li>
                
                
            </ul>
        </nav>
    </header>
    <span class="name_system">Levantamiento de Información</span>
</div>
<div class="user-mobile">
    <header>
        <img class="activator-user" id="activator-user" src="/images/users/<?php echo $_SESSION['image']; ?>">
        <nav>
            <ul>
                <li class="first-item">
                    <a class="<?php if ($output[1] == 'user') {
                        echo 'active-user';
                    } ?>" href="/users"><span class="icon">settings</span><span class="text">Configuración</span></a>
                </li>
                <li>
                    <a href="/modules/logout"><span class="icon">logout</span><span class="text">Cerrar
                            sesión</span></a>
                </li>
            </ul>
        </nav>
    </header>
</div>
<script src="/js/external/gsap.min.js"></script>
<script src="/js/controls/menumobile.js"></script>