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
<title>formulario de insumo</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=720,height=380, scrollbars=1') ; 
} 
</script>
<script>
function validar(formulario){
	if(document.formulario.cod_i.value==""){
		alert("Debe ingresar algun codigo");
		return false;
	}else{
	return true;	
		}
}
</script>
<body onLoad="document.formulario.cod_i.focus();">
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

<form id="formulario" name="formulario" method="post" action="../controladores/consultar_insumoBD.php"onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc" >
<legend>PRODUCTO</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="cod_i">C&oacute;digo:</td>
<td><input type="text" name="cod_i" id="cod_i" maxlength="5" onKeyPress="return soloNumeros(event,this)"
tabindex=1></td>
<tr>
<td><label for="descripcion">Descripci&oacute;n:</td>
<td><input type="text" name="descripcion" id="descripcion" disabled="disabled" tabindex=2></label></td>
<tr>
<td><label for="tipo_p">Tipo de Producto:</td>
<td>
<select name="tipo_p" id="tipo_p" disabled="disabled" tabindex=3>
<option value="selecionar..."></option>
<option value="insumos">Insumos</option>
<option value="reactivos">Reactivos</option>
<option value="materiales">Materiales</option>
</select></td>
<tr>
<td><label for="presentacion">Presentaci&oacute;n:</label>
<td>
<select name="presentacion" id="presentacion" disabled="disabled" tabindex=3>
<option value="elija_opcion"></option>
</select></td>
<tr>
<td><label for="almacen">Almacen:</td>
<td><input type="text" name="almacen" id="almacen"value="Coordinaci&oacute;n de Laboratorios" disabled="disabled" tabindex=4></td>
<tr>
<td><label for="observacion">Observaci&oacute;n:</td>
<td><input type="text" name="observacion" id="observacion" disabled="disabled" tabindex=5></td>
</table>
</form>
<a href="javascript:abrir('../reportes/ver_productos.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Productos">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario" value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario" >
</ul>
</div>
</div>
</div>
</body>
</html>