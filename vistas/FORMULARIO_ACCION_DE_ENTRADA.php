
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionentrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<title>Accion de Entrada</title>
</head>
<script>
function validar(formulario4) {
			var bOk = false; 
        id_e= document.getElementById("id_e").value; 
       /******************COMPRUEBA la accion_de_salida********************/
if( id_e == null || id_e.length == 0 || /^\s+$/.test(id_e) ) {
 alert('Introduzca un ID');
 document.getElementById("id_e").focus();
  return false;
}
}
</script>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=420,height=280, scrollbars=1') ; 
} 
</script>
<body onLoad="document.formulario4.id_e.focus();">

<div id="container">
<div id="Cabeza">

<img src="../logos/yaracuy.png" width="106" height="104" align="left" >

<img src="../logos/prosalud.png" width="106" height="104" align="right">

<font color="#FFFFFF"><center><h2>Rep&uacute;blica Bolivariana de Venezuela<br>Instituto Aut&oacute;nomo de la Salud PROSALUD Yaracuy<br>Coordinaci&oacute;n de Laboratorio</h2></center></font>
</div>

<div id="content">




<div id="column_left"><br><img src="../logos/logo.png" width="210" height="650" align="center"></div>

<div id="column_right">
<div id="column_menu">
<?php  

include("../menu/menu.php");  

?>
</div>
    <br>
        <br>
<form id="formulario4" name="formulario4" method="post" action="../controladores/accion_entrada_consultarBD.php"  onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc" >
<legend>ACCI&Oacute;N DE ENTRADA</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_e"><center>Id:</center>
<td><input type="text" name="id_e" id="id_e" maxlength="5" tabindex=1 onKeyPress="return soloNumeros(event)">

<tr>
<td><label for="razon_entrada"tabindex=2><center>Raz&oacute;n de Entrada:</center>
<td><input type="text" name="razon_entrada" id="razon_entrada" disabled="disabled">
</table>
</form>
<a href="javascript:abrir('../reportes/ver_accionentrada.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las acciones de entrada">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir"  type="submit" id="incluir" value="Incluir" disabled="disabled">
<input  class="vertical" name="Modificar" type="submit" id="modificar" value="Modificar" disabled="disabled">
<input  class="vertical" name="consultar" type="submit" id="consultar" form="formulario4" value="Consultar">
</ul>

</div>
</div>

</div>
</body>
</html>