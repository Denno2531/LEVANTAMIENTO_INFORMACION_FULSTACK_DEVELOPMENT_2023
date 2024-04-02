<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM infoq WHERE num = '" . $_POST['txtnum'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
        $_SESSION['num'] = $row['num'];
        $_SESSION['infoq_description'] = $row['descripcion'];
        $_SESSION['infoq_archivo'] = $row['archivopdf'];
    }
}

$id = $_SESSION["user_id"];
?>

<div class="form-data">
    <div class="head">
        <h1 class="titulo">Consultar</h1>
    </div>
    <div class="body">
        <form name="form-consult-infoq" action="#" method="POST">
            <div class="wrap">
                <div class="first">
                    <label class="label">Usuario</label>
                    <input style="display: none;" type="text" name="btn" value="form_default" />
                    <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
                    <label class="label">N°PDF</label>
                    <input style="display: none;" type="text" name="btn" value="form_default" />
                    <input class="text" type="text" name="txtnum" value="<?php echo $_SESSION['num']; ?>" disabled />
                </div>

                <div class="first">
                    <label for="txtuserarchivo" class="label">Archivo</label>
                    <input id="txtuserarchivo" class="text" type="text" name="pdf_archivo" value="<?php echo $_SESSION['infoq_archivo']; ?>" accept="application/pdf" disabled />
                    <label for="txtinfoqdescription" class="label">Descripción</label>
                    <input id="txtinfoqdescription" class="text" type="text" name="txtinfoqdescription" value="<?php echo $_SESSION['infoq_description']; ?>" accept="application/pdf" disabled />
                    
                </div>

                <div class="last">
                    <label for="txtinformes" class="label">Archivos</label>

                    <textarea id="txtinfoqdescription" class="textarea" name="txtinfoqdescription" placeholder="Seleccione fechas" style="height: 100px; width: 400px; font-size: 16px;" readonly wrap="soft" disabled><?php echo $_SESSION['infoq_description']; ?></textarea>
                    <?php 
                        $path = 'informesquincenalespdf/' . $id;
                        if(file_exists($path)){
                            $directorio= opendir($path);
                            while($archivo=readdir($directorio)){
                                if(!is_dir($archivo)){
                                    echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "'
                                    title='Ver archivo adjunto'class='btn btn-primary' target='_blank'><img src='../../../images/iconos/pdf.png'> Ver</a>";
                                    echo " $archivo";                                    
                                }
                                echo "hola mundo\n \n \n \n";
                            }
                        }
                    ?>                    
                </div>

                   
                
            </div>

            <button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>                    
 </div>
<div class="content-aside">
    <?php include_once "../sections/options-disabled.php"; ?>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="/js/modules/students.js" type="text/javascript"></script>
