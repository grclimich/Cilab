<?php
   session_start();
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/insumo.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<title>formulario de receptores</title>
</head>
<script>
function validar(formulario3){
	if(document.formulario3.cod_r.value==""){
		alert("Debe ingresar algun codigo");
		return false;
	}else{
	return true;
		}
}
</script>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=720,height=380, scrollbars=1') ; 
} 
</script>
<body onLoad="document.formulario3.cod_r.focus();">

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
<form id="formulario3" name="formulario3" method="post" action="../controladores/consulta_laboratorioBD.php"onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc">
<legend>LABORATORIOS RECEPTORES</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="cod_r">C&oacute;digo:
<td><input type="text" name="cod_r" id="cod_r"maxlength="5"tabindex=1  onKeyPress="return soloNumeros(event)"></td>
<tr>
<td><label for="nro_rif">Nro de Rif:
<td><input type="text" name="nro_rif" id="nro_rif" disabled="disabled" maxlength="12" tabindex=6></td>
<tr>
<td><label for="nombre_2">Nombre:
<td><input type="text" name="nombre"id="nombre" disabled="disabled" </label></td>
<tr>
<td><label for="direccion">Direcci&oacute;n:
<td><input type="text" name="direccion"id="direccion" disabled="disabled" tabindex=3></td>
<tr>
<td><label for="municipio"><center>Municipio:</center>
<td>
<select name="municipio"disabled="disabled">
<option value="elija_opcion"></option>
<option value="Aristides Bastidas">Ar&iacute;stides Bastidas-San Pablo</option>
<option value="Bolivar">Bol&iacute;var-Aroa</option>
<option value="Bruzual">Bruzual-Chivacoa</option>
<option value="Cocorote">Cocorote-Cocorote</option>
<option value="Independencia">Independencia-Independencia</option>
<option value="Jose Antonio Paez">Jos&eacute; Antonio P&aacute;ez-Sabana de Parra</option>
<option value="La Trinidad">La Trinidad-Boraure</option>
<option value="Manuel Monge">Manuel Monge-Yumare</option>
<option value="Nirgua">Nirgua</option>
<option value="Pena">Pe&ntilde;a-Yaritagua</option>
<option value="San Felipe">San Felipe-San Felipe</option>
<option value="Sucre">Sucre-Guama</option>
<option value="Urachiche">Urachiche-Urachiche</option>
<option value="Veroes">Veroes-Farriar</option>
</select></td>
<tr>
<td><label for="telefono">Tel&eacute;fono:
<td><input type="text" name="telefono"id="telefono" maxlength="11" disabled="disabled" </td>
<tr>
<td><label for="nro_fax">Nro de Fax:
<td><input type="text" name="nro_fax" id="nro_fax" maxlength="11" disabled="disabled" </td>

</table>
</form>
<a href="javascript:abrir('../reportes/ver_laboratorios.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Registro de laboratorios">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit"  value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario3" >
</ul>
</div>
</div>
</div>
</body>
</html>