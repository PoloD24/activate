<?php
include_once("../clases/recorridos.php");
include_once("../clases/usuarios.php");
include_once("../clases/detalle_usuario.php");
$clRecorrido = new clRecorridos();
$clUsuario = new clUsuarios();
$clDetalleUsuario = new clDetalleUsuarios();
?>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    </head>
    <body>
        <div class="form">
            <br>
            <form id="frmPasos" method="post">
                <div>
                    <label>Usuario </label>
                    <br>
                    <select id="usuario" class="input_form">
                        <option disabled >Seleccione una opción</option>
                        <?php
                        $usuario = $clUsuario->selectWithWhere("statusUsuario=1");
                        foreach($usuario as $row){
                            ?>
                            <option value="<?php echo $row['idUsuario']?>"><?php echo $row['usuario'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Cantidad</label>
                    <br>
                    <input class="input_form" type="number" name="paso" id="paso" placeholder="Ingrese Cantidad de Pasos"/>    
                </div>
                <button id="addPaso" onclick="insertarPaso();" name="addPaso" class="btn">Agregar</button>
            </form>
        </div>
        <div id="table">
            <?php
            $recorridos= $clRecorrido->selectWithWhere("1=1");
            ?>
            <table width="100%">
                <tr class="bg">
                    <td>ID</td>
                    <td>Fecha</td>
                    <td>Usuario</td>
                    <td>Pasos</td>
                </tr>
            <?php
            foreach($recorridos as $row){
                $detalle = $clDetalleUsuario->selectWithWhere("idUsuario=".$row['idUsuario'])[0];
                ?>
                <tr>
                    <td><?php echo $row['idRecorrido'] ?></td>
                    <td><?php echo $row['fechaRecorrido'] ?></td>
                    <td><?php echo $detalle['nombreUsuario']. ' '.$detalle['apellidosUsuario'] ?></td>
                    <td><?php echo $row['pasosRecorridos'] ?></td>    
                </tr>
                
                <?php
            }
            ?>
            </table>
        </div>
    </body>
</html>