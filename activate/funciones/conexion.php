<?php
function conectar(){
    $conn1 =mysql_connect('localhost', 'root', '');
	mysql_select_db('db_activate');
    return $conn1;
}
function desconectar(){
    mysql_close();
}
?>