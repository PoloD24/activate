<?php
include_once("../clases/recorridos.php");
$clRecorrido = new clRecorridos();
if($_GET['accion']=="insertar"){
    $clRecorrido->insertar($_GET['paso'],$_GET['usuario']);
}
?>
