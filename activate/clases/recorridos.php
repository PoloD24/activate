<?php
class clRecorridos {
    var $conn;
    var $tableName="recorridos";
    function __construct(){
        include_once("../funciones/conexion.php");
        $this->conn= conectar();
        date_default_timezone_set('America/Mexico_City');
    }
    function insertar($intPasos,$intIdUsuario){
        $fecha = date("Y-m-d H:i:s");
        $sql ="insert into ".$this->tableName;
        $sql .=" (idRecorrido,fechaRecorrido,pasosRecorridos,idUsuario)";
        $sql .="values (";
        $sql .="NULL,";
        $sql .="'".$fecha."',";
        $sql .="'".$intPasos."',";
        $sql .="'".$intIdUsuario."'";
        $sql .=")";
        $res = mysql_query($sql,$this->conn) or die("Pasos Recorridos Insertar:".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function update($fecha,$intPasos,$idRecorrido,$intIdUsuario){
        $sql ="update set ".$this->tableName;
        $sql .=" set";
        $sql .="fechaRecorrido='".$fecha."',";
        $sql .="pasosRecorridos='".$strNameUsuario."',";
        $sql .="idUsuario=".$intIdUsuario;
        $sql .="where idRecorrido=".$idRecorrido;
        $res= mysql_query($sql,$this->conn)or die("Recorridos Actualizar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function delete($intIdRecorrido){
        $sql ="delete * from ";
        $sql.= $this->tableName;
        $sql .=" where ";
        $sql .=" idRecorrido=".$intIdUsuario;
        $res= mysql_query($sql,$this->conn)or die("Recorrido Eliminar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function selectWithWhere($where){
        $listaRecorridos= array();
        $sql="select * from ".$this->tableName;
        $sql .=" where ".$where;
        $res = mysql_query($sql,$this->conn)or die("Recorrido Select ".mysql_error());
        while($row = mysql_fetch_array($res)){
            $listaRecorridos[] = $row;
        }
        return $listaRecorridos;
    }
    function consulta($query){
        $listaRecorrido= array();
        //echo $query;
        $res = mysql_query($query,$this->conn);
        while($row = mysql_fetch_array($res)){
            $listaRecorrido[]=$row;
        }
        return $listaRecorrido;
    }
}
?>