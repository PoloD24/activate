<?php
class clUsuarios {
    var $conn;
    var $tableName="usuarios";
    function __construct(){
        include_once("../funciones/conexion.php");
        $this->conn= conectar();
        date_default_timezone_set('America/Mexico_City');
    }
    function insertar($strUsuario,$strPassword){
        $sql ="insert into ".$this->tableName;
        $sql .=" (idUsuario,usuario,password,statusUsuario)";
        $sql .="values (";
        $sql.="NULL,";
        $sql .="'".$strUsuario."',";
        $sql .="'".$strPassword."',";
        $sql .="1";
        $sql .=")";
        $res = mysql_query($sql,$this->conn) or die("Usuarios Insertar:".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function update($intIdUsuario, $strUsuario,$strPassword,$intStatus){
        $sql ="update set ".$this->tableName;
        $sql .=" set";
        $sql .="usuario='".$strUsuario."',";
        $sql .="password='".$strPassword."',";
        $sql .="statusUsuario=".$intStatus;
        $sql .="where idUsuario=".$intIdUsuario;
        $res= mysql_query($sql,$this->conn)or die("Usuarios Actualizar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function delete($intIdUsuario){
        $sql ="delete * from ";
        $sql.= $this->tableName;
        $sql .=" where ";
        $sql .=" idUsuario=".$intIdUsuario;
        $res= mysql_query($sql,$this->conn)or die("Usuarios Eliminar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function selectWithWhere($where){
        $listaUsuarios= array();
        $sql="select * from ".$this->tableName;
        $sql .=" where ".$where;
        $res = mysql_query($sql,$this->conn)or die("Usuarios Select ".mysql_error());
        while($row = mysql_fetch_array($res)){
            $listaUsuarios[] = $row;
        }
        return $listaUsuarios;
    }
    function selectMax(){
        $listaUsuarios= array();
        $sql="select max(idUsuario) as idUsuario from ".$this->tableName;
        $res = mysql_query($sql,$this->conn)or die("Usuarios Max ".mysql_error());
        while($row = mysql_fetch_array($res)){
            $listaUsuarios[] = $row;
        }
        return $listaUsuarios;
    }
}

?>