<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['id_department'] = array();
$_SESSION['department_name'] = array();
$_SESSION['department_description'] = array();
$_SESSION['depart_teacher'] = array();

$sql = "SELECT * FROM department WHERE id_department = '" . $_POST['txtcareer'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['id_department'][0] = $row['id_department'];
        $_SESSION['department_name'][0] = $row['name'];
        $_SESSION['department_description'][0] = $row['description'];
        $_SESSION['depart_teacher'][0] = $row['teacher'];
    }
}
?>

<div class="form-data">
    <div class="head">
        <h1 class="titulo">Actualizar</h1>
    </div>
    <div class="body">
        <form name="form-update-department" action="update.php" method="POST">
            <div class="wrap">
                <div class="first">
                    <label for="txtcareerid" class="label">Departamento</label>
                    <input style="display: none;" type="text" name="txtcareer" value="<?= $_SESSION['id_department'][0] ?>" />
                    <input id="txtcareerid" class="text" type="text" name="txtcareer" value="<?= $_SESSION['id_department'][0] ?>" disabled />
                </div>
                <div class="last">
                    <label for="txtcareername" class="label">Nombre</label>
                    <input id="txtcareername" class="text" type="text" name="txtcareername" value="<?= $_SESSION['department_name'][0] ?>" maxlength="100" required autofocus />
                </div>
                <div class="last">
                    <label for="selectUserTeacher" class="label">Seleccione un tutor</label>
                    <select id="selectUserTeacher" class="select" name="selectUserTeacher" required>
                        <?php
                        $tutorAsignado = $_SESSION['depart_teacher'][0];

                        if ($tutorAsignado == '') {
                            echo '<option value="">Seleccione</option>';
                        }

                        $sql = "SELECT user, name FROM teachers";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['user'] == $tutorAsignado) {
                                    echo '<option value="' . $row['user'] . '" selected>' . $row['name'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['user'] . '">' . $row['name'] . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="description">
                    <label for="txtcareerdescription" class="label">Descripción</label>
                    <textarea id="txtcareerdescription" maxlength="2000" class="textarea" name="txtcareerdescription" data-expandable><?= $_SESSION['department_description'][0] ?></textarea>
                </div>
            </div>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>

<div class="content-aside">
    <?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/controls/dataexpandable.js"></script>

