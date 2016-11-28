/*js*/
function pasos() {
    $("#main").load("forms/pasos.php");
}
function insertarPaso() {
    var cantidadPaso= $("#paso").val();
    var usuario=$("#usuario").val();
    var url='funciones/recorridos.php?accion=insertar&paso='+cantidadPaso+'&usuario='+usuario;
    $.ajax({
            type: "POST",
            url: url,
            data: $("#frmPasos").serialize(),
            success: function(data){
               $("#main").load("forms/pasos.php");
            }
            });
         return false;
}
function frmReportes() {
    $("#main").load("forms/reportes.php");
}