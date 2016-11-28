<?php
class clRecorridos {
    var $conn;
    var $tableName="configuraciones";
    function __construct(){
        include_once("../funciones/conexion.php");
        $this->conn= conectar();
        date_default_timezone_set('America/Mexico_City');
    }
    function insertar($intPasos){
        $fecha = date("Y-m-d H:i:s");
        $sql ="insert into ".$this->tableName;
        $sql .=" (idConfiguracion,metrosPaso)";
        $sql .="values (";
        $sql .="NULL,";
        $sql .=$intPasos;
        $sql .=")";
        $res = mysql_query($sql,$this->conn) or die("Configuracion Insertar:".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function update($pasos,$intIdConfiguracion){
        $sql ="update set ".$this->tableName;
        $sql .=" set";
        $sql .="metrosPaso=".$pasos;
        $sql .="where idConfiguracion=".$intIdConfiguracion;
        $res= mysql_query($sql,$this->conn)or die("Configuracion Actualizar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function delete($intIdConfiguracion){
        $sql ="delete * from ";
        $sql.= $this->tableName;
        $sql .=" where ";
        $sql .=" idConfiguracion=".$intIdConfiguracion;
        $res= mysql_query($sql,$this->conn)or die("Configuracion Eliminar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function selectWithWhere($where){
        $listaConf= array();
        $sql="select * from ".$this->tableName;
        $sql .=" where ".$where;
        $res = mysql_query($sql,$this->conn)or die("Configuracion Select ".mysql_error());
        while($row = mysql_fetch_array($res)){
            $listaConf[] = $row;
        }
        return $listaConf;
    }
}
?>