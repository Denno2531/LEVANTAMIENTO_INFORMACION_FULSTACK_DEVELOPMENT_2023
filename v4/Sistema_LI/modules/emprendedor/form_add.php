<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'empre-' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar Beneficiario</h1>
    </div>
    <div class="body">
        <form name="form-add-emprendedor" action="insert.php" method="POST" autocomplete="off" autocapitalize="on">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />  
                    <label for="txtpass" class="label">Contraseña</label>
                    <input id="txtpass" class="text" type="password" name="txtpass" value="" placeholder="XXXXXXXXX" attern="[A-Za-z0-9]{8}" maxlength="8" required/>
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="" placeholder="Nombre" maxlength="30" required autofocus />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" placeholder="Apellidos" value="" maxlength="60" required />
                    <label for="dateofbirth" class="label">Fecha de nacimiento</label>
                    <input id="dateuseradmission" class="date" type="date" name="dateofbirth" value="<?php echo date('Y-m-d'); ?>" required /> 
                    <label for="txtcity" class="label">Ciudad</label>
                    <input id="txtcity" class="text" type="text" name="txtcity" value="" placeholder="ciudad" maxlength="50" required />
                    <div class="descri">   
                    <label for="txtworkinghours" class="label">Seleccione el horario del empredimiento</label>
                        <input id="txtworkinghours" class="text" type="hidden" name="txtworkinghours" value=""
                        placeholder="Seleccione el horario" maxlength="20000" data-expandable />
                        <div class="hour-picker">
                            <div>
                                <label for="txtworkinghours_start" class="text">Abierto desde:</label>
                                <input id="txtuserworkinghours_start" class="hour-input" type="time" name="txtuserworkinghours_start">
                            </div>
                            <div>
                              <label for="txtworkinghours_end" class="text">Cerrado:</label>
                              <input id="txtworkinghours_end" class="hour-input" type="time" name="txtuserworkinghours_end">
                            <!-- <button id="addHourBtn" class="btn icon"><i
                                class="fas fa-plus-circle fa-lg fa-spin"></i></button> -->
                            </div>
                            <div class="three">
                    <label for="selecteducation" class="label">Nivel de educación</label>
                    <select id="selecteducation" class="select" name="selecteducation" required>
                        <option value="">Seleccione</option>
                        <option value="Sin nivel de estudio">Sin Formación</option>
                        <option value="Escuela">Escuela</option>
                        <option value="Colegio">Colegio</option>
                        <option value="Tecnología">Tecnología</option>     
                        <option value="Universidad">Universidad</option>                        
                    </select>
                    </div>
                    <div class="four">
                    <label for="selectsocialnetworks" class="label">Utiliza redes sociales</label>
                    <select id="selectsocialnetworks" class="select" name="selectsocialnetworks" required>
                        <option value="">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>                        
                    </select>
                    </div>
                    
                    <div class="twenty">
                    <label for="salesyear" class="label">Ventas de año 2019</label>
                    <input id="salesyear" class="text" type="text" name="salesyear" placeholder="Ventas del año 2019" value="<?php echo isset($_POST['salesyear']) ? htmlspecialchars($_POST['salesyear']) : ''; ?>" maxlength="50" required />
                    </div>

                    <div class="eleven">
                    <label for="salesyear1" class="label">Ventas de año 2020</label>
                    <input id="salesyear1" class="text" type="text" name="salesyear1" placeholder="Ventas del año 2020" value="<?php echo isset($_POST['salesyear1']) ? htmlspecialchars($_POST['salesyear1']) : ''; ?>" maxlength="50" required />
                    </div>

                    <div class="third">
                    <label for="salesyear2" class="label">Ventas de año 2021</label>
                    <input id="salesyear2" class="text" type="text" name="salesyear2" placeholder="Ventas del año 2021" value="<?php echo isset($_POST['salesyear2']) ? htmlspecialchars($_POST['salesyear2']) : ''; ?>" maxlength="50" required />
                    </div>

                    <div class="fourth">
                    <label for="salesyear3" class="label">Ventas de año 2022</label>
                    <input id="salesyear3" class="text" type="text" name="salesyear3"  placeholder="Ventas del año 2022" value="<?php echo isset($_POST['salesyear3']) ? htmlspecialchars($_POST['salesyear3']) : ''; ?>" maxlength="50" required />
                    </div>
                    
                    <div class="one">
                    <label for="salesyear4" class="label">Ventas de año 2023</label>
                    <input id="salesyear4" class="text" type="text" name="salesyear4" placeholder="Ventas del año 2023"  value="<?php echo isset($_POST['salesyear4']) ? htmlspecialchars($_POST['salesyear4']) : ''; ?>" maxlength="50" required />
                    </div>
                   
                    </div>
                    </div>
                    <div class="label" id="hourListContainer">
                        <br>
                        <ul id="hourList"></ul>
                    </div>

                </div>
                <div class="last">
                    <label for="selectgender" class="label">Género</label>
                    <select id="selectgender" class="select" name="selectgender" required>
                        <option value="">Seleccione</option>
                        <option value="mujer">Femenino</option>
                        <option value="hombre">Masculino</option>
                        <option value="otro">Otro</option>                        
                    </select>
                    <label for="txtusercurp" class="label">Cédula</label>
                    <input id="txtusercurp" class="text" type="text" name="txtcurp" value="" placeholder="Cédula de Identidad" pattern="[0-9]{10}" maxlength="10"  required />
                    <label for="txtuserrfc" class="label">Nacionalidad</label>
                    <input id="txtuserrfc" class="text" type="text" name="txtrfc" value="" placeholder="Nacionalidad" maxlength="100"required />
                    <label for="txtuserphone" class="label">Número de teléfono</label>
                    <input id="txtuserphone" class="text" type="text" name="txtphone" value="" placeholder="09999XXXXX" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." maxlength="10" required />
                    <label for="txtuseraddress" class="label">Correo Electrónico</label>
                    <input id="txtuseraddress" class="text" type="email" name="txtaddress" value="" placeholder="ejemplo@email.com" maxlength="200" required />
                    <div class="eight">
                    <label for="selectorganization" class="label">Organización</label>
                    <select id="selectorganization" class="select"  name="selectorganization" required >
                    <option value="">Seleccione</option>
                        <option value="No">No pertenezco</option>
                        <option value="UDELA">UDELA</option>
                        <option value="Cooprede">COOPREDE</option>
                        <option value="otro">Otro</option>                        
                    </select>
                    </div>
                    <label for="txtnameorganization" class="label">Nombre de empredimiento</label>
                    <input id="txtnameorganization" class="text" type="text" name="txtnameorganization" placeholder="Nombre de empredimiento" value="" maxlength="50" />
                    <div class="second">
                    <label for="selectstate" class="label">Estado</label>
                    <select id="selectstate" class="select" name="selectstate" required>
                        <option value="">Seleccione</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>                        
                    </select>
                </div>
                    <label for="startdate" class="label">Fecha de inicio</label>
                    <input id="datebeneficiaries" class="date" type="date" name="startdate" value="<?php echo date('Y-m-d'); ?>" required /> 
                    <div class="five">
                    <label for="selectsocialsales" class="label">Realiza ventas por redes sociales</label>
                    <select id="selectsocialsales" class="select" name="selectsocialsales" required >
                        <option value="">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>                        
                    </select>
                    </div>
                    

                    <div class="twenty-one">
                    <label for="heritage" class="label">Patrimonio de año 2019</label>
                    <input id="heritage" class="text" type="text" name="heritage" placeholder="Patrimonio del año 2019" value="<?php echo isset($_POST['heritage']) ? htmlspecialchars($_POST['heritage']) : ''; ?>" maxlength="50" required />
                    </div>

                    <div class="tweny-two">
                    <label for="heritage1" class="label">Patrimonio de año 2020</label>
                    <input id="heritage1" class="text" type="text" name="heritage1" placeholder="Patrimonio del año 2020" value="<?php echo isset($_POST['heritage1']) ? htmlspecialchars($_POST['heritage1']) : ''; ?>" maxlength="50" required />
                    </div>

                    <div class="twenty-two">
                    <label for="heritage2" class="label">Patrimonio de año 2021</label>
                    <input id="heritage2" class="text" type="text" name="heritage2" placeholder="Patrimonio del año 2021" value="<?php echo isset($_POST['heritage2']) ? htmlspecialchars($_POST['heritage2']) : ''; ?>" maxlength="50" required />
                    </div>

                    <div class="twenty-three">
                    <label for="heritage3" class="label">Patrimonio de año 2022</label>
                    <input id="heritage3" class="text" type="text" name="heritage3"  placeholder="Patrimonio del año 2022" value="<?php echo isset($_POST['heritage3']) ? htmlspecialchars($_POST['heritage3']) : ''; ?>" maxlength="50" required />
                    </div>
                    
                    <div class="twent-four">
                    <label for="heritage4" class="label">Patrimonio de año 2023</label>
                    <input id="heritage4" class="text" type="text" name="heritage4" placeholder="Patrimonio del año 2023"  value="<?php echo isset($_POST['heritage4']) ? htmlspecialchars($_POST['heritage4']) : ''; ?>" maxlength="50" required />
                    </div>
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
<script src="/js/modules/emprendedor.js" type="text/javascript"></script>

<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>