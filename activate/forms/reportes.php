<?php
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
?>
<html>
    <head>        
    </head>
    <body>
        <div>
            <label>Opci&oacuten</label>
            <br>
            <select onchange="cambio()" id="opciones" class="input_form">
                <option value="1">Por d&iacutea</option>
                <option value="2">Periodo de Fechas</option>
            </select>
            <br>
            <label>Seleccionar Fecha</label>
            <br>
            <input type="date" name="fInicial" id="fInicial" value="<?php echo $fecha ?>" class="input_form">
            <div id="desplegar">
                <label>Seleccionar Fecha</label>
                <br>
                <input type="date" name="fFinal" id="fFinal" class="input_form" value="<?php echo $fecha ?>">
            </div>
            <div >
                
                <button class="btn" onclick="lanza();">Ver</button>
            </div>
        </div>
        <script type="text/javascript" src="js/ajax_reportes.js"></script>
    </body>
</html>