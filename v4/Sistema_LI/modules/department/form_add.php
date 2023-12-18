<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar Departamento</h1>
    </div>
    <div class="body">
        <form name="form-add-department" action="insert.php" method="POST">
            <div class="wrap">
                <div class="first">
                    <label for="txtdepartmentid" class="label">Departamento</label>
                    <input id="txtdepartmentid" class="text" type="text" name="txtdepartment" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" autofocus required />
                </div>
                <div class="last">
                    <label for="txtdepartmentname" class="label">Nombre</label>
                    <input id="txtdepartmentname" class="text" type="text" name="txtdepartmentname" value="" maxlength="100" required />
                </div>
                <div class="last">
                    </select>
                        <label for="selectUserTeacher" class="label">Seleccione un tutor</label>
                        <select id="selectUserTeacher" class="select" name="selectUserTeacher" required>
                            <option value="">Seleccione</option>
                            <?php
                            $sql = "SELECT user, name FROM teachers";

                            if ($result = $conexion->query($sql)) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo
                                    '
                                            <option value="' . $row['user'] . '">' . $row['name'] . '</option>
                                    ';
                                }
                            }
                            ?>
                    </select>
                </div>
                <div class="description">
                    <label for="txtdepartmentdescription" class="label">Descripción</label>
                    <textarea id="txtdepartmentdescription" maxlength="2000" class="textarea" name="txtdepartmentdescription" data-expandable></textarea>
                </div>
            </div>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/controls/dataexpandable.js"></script>

<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>