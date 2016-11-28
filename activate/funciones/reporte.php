<?php
include_once("../clases/recorridos.php");
include_once("../clases/detalle_usuario.php");
$clRecorrido = new clRecorridos();
$clDetalleUsuario = new clDetalleUsuarios();
if($_GET['accion']=="diario"){
    ?>
    <br>
    Diario
    <table width="100%">
        <tr class="bg">
            <td>ID</td>
            <td>Fecha</td>
            <td>Usuario</td>
            <td>Pasos</td>
            <td>Metros</td>
        </tr>
        <?php
        $recorrido = $clRecorrido->consulta("select * from recorridos where fechaRecorrido between '".$_GET['fInicial']." 00:00:00' and '".$_GET['fInicial']." 12:00:00' order by pasosRecorridos desc");
        foreach($recorrido as $row){
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
    <?php
}
if($_GET['accion']=="periodo"){
    ?>
    <br>
    Rango de Fechas
    <table width="100%">
        <tr class="bg">
            <td>ID</td>
            <td>Fecha</td>
            <td>Usuario</td>
            <td>Pasos</td>
            <td>Metros</td>
        </tr>
        <?php
        $recorrido = $clRecorrido->consulta("select * from recorridos where fechaRecorrido between '".$_GET['fInicial']." 00:00:00' and '".$_GET['fFinal']." 12:00:00' order by pasosRecorridos desc");
        foreach($recorrido as $row){
            $detalle = $clDetalleUsuario->selectWithWhere("idUsuario=".$row['idUsuario'])[0];
            ?>
            <tr>
                <td><?php echo $row['idRecorrido'] ?></td>
                <td><?php echo $row['fechaRecorrido'] ?></td>
                <td><?php echo $detalle['nombreUsuario']. ' '.$detalle['apellidosUsuario'] ?></td>
                <td><?php echo $row['pasosRecorridos'] ?></td>
                <?php
                $metros = 0.79 * $row['pasosRecorridos'];
                ?>
                <td><?php echo $metros ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>