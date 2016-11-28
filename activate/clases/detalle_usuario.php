<?php
class clDetalleUsuarios {
    var $conn;
    var $tableName="detalle_usuario";
    function __construct(){
        include_once("../funciones/conexion.php");
        $this->conn= conectar();
        date_default_timezone_set('America/Mexico_City');
    }
    function insertar($intIdUsuario,$strNameUsuario,$strApellidos){
        $sql ="insert into ".$this->tableName;
        $sql .=" (idDetalleUsuario,nombreUsuario,apellidosUsuario)";
        $sql .="values (";
        $sql .="NULL,";
        $sql .=$intIdUsuario.",";
        $sql .="'".$strNameUsuario."',";
        $sql .="'".$strApellidos."'";
        $sql .=")";
        $res = mysql_query($sql,$this->conn) or die("Detalle Usuarios Insertar:".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function update($intIdDetalleUsuario, $intIdUsuario,$strNameUsuario,$strApellidos){
        $sql ="update set ".$this->tableName;
        $sql .=" set";
        $sql .="idUsuario='".$intIdUsuario."',";
        $sql .="nombreUsuario='".$strNameUsuario."',";
        $sql .="apellidosUsuario=".$strApellidos;
        $sql .="where idDetalleUsuario=".$intIdDetalleUsuario;
        $res= mysql_query($sql,$this->conn)or die("Detalle Usuarios Actualizar: ".mysql_error());
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
        $sql .=" idDetalleUsuario=".$intIdUsuario;
        $res= mysql_query($sql,$this->conn)or die("Detalle Usuarios Eliminar: ".mysql_error());
        $error = 1;
        if(!$res){
            $error=0;
        }else{
            $error=1;
        }
        return $error;
    }
    function selectWithWhere($where){
        $listaDetalleUsuarios= array();
        $sql="select * from ".$this->tableName;
        $sql .=" where ".$where;
        $res = mysql_query($sql,$this->conn)or die("DetalleUsuarios Select ".mysql_error());
        while($row = mysql_fetch_array($res)){
            $listaDetalleUsuarios[] = $row;
        }
        return $listaDetalleUsuarios;
    }
}

?>