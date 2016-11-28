/*js*/

function cambio() {
    var opcion = $("#opciones").val();
    if(opcion==1) {
        $("#desplegar").hide();
    }else{
        $("#desplegar").show();
    }
    $("#main").load(url);
}
$( document ).ready(function() {
   $("#desplegar").hide();
});
function lanza() {
    var opcion = $("#opciones").val();
    var accion="";
    var url="funciones/reporte.php"
    if(opcion==1) {
        accion="diario";
        $("#desplegar").hide();
        url = url + "?accion="+accion+"&fInicial="+$("#fInicial").val();
    }else{
        accion="periodo";
        $("#desplegar").show();
        url = url + "?accion="+accion+"&fInicial="+$("#fInicial").val()+"&fFinal"+$("#fFinal").val();
    }
    $("#main").load(url);
}