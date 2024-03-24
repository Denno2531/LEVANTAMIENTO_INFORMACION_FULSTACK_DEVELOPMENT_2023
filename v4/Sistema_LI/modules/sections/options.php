<?php
include_once 'security.php';
?>
<div class="form-options">
    <div class="options">
    <?php
        if ($_SERVER['REQUEST_URI'] === '/modules/edit_send_one/') {
            echo '<form action="" method="POST">';
            echo '<button id="btnAddOptions" class="btn btn-add btn-disabled icon" name="btn" value="form_add" type="submit">add</button>';
            echo '</form>';
        }else{
            echo '<form action="" method="POST">';
            echo '<button id="btnAddOptions" class="btn btn-add icon" name="btn" value="form_add" type="submit">add</button>';
            echo '</form>';
        }
    ?>

        <form action="" method="POST">
            <button class="btn btn-disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
        </form>
        <form action="" method="POST">
    <button class="btn btn-disabled icon" name="btn" value="form_printer" type="submit">print</button>
</form>



        <button id="btnSearchMobile" class="btn btn-search-mobile icon">search</button>
        <form action="/">
            <button id="btnExitOptions" class="btn btn-exit icon" type="submit">exit_to_app</button>
        </form>
    </div>
    <div class="search">
        <form name="form-search" action="" method="POST">
            <p>
                <input type="text" class="text-search" id="txtSearch" name="search" placeholder="Buscar..." autofocus>
                <button id="btnSearch" class="btn-search icon" type="submit">search</button>
            </p>
        </form>
    </div>
</div>
<script src="/js/controls/options.js"></script>


<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>