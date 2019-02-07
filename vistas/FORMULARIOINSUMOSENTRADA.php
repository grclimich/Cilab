<?php
   session_start();
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioentrada.css">
<link rel="stylesheet"  type="text/css" href="../css/factura_entrada.css">

<script type="text/javascript" src="../js/funciones.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../js/calendario.js"></script>
<title>formulario de entrada</title>
</head>
<script>
function validar(formulario1){
	if(document.formulario1.cod_e.value==""){
		alert("Debe ingresar algun codigo");
		return false;
	}else{
	return true;	
		}
}
</script>
<body onLoad="document.formulario1.cod_e.focus();">
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
   
 

    
<form id="formulario1" name="formulario1" method="post" action="../controladores/consultar_entrada_insumoBD.php"  onSubmit="return valFechas()">
<div id="form-1">
<table id="tabla">
<tr>
    <td id="th">C&oacute;digo de Entrada</th>
    <td id="th">Acci&oacute;n de Entrada</th>
	<td id="th">Proveedor</th>
	<td id="th">Fecha de Entrada</th>
	<td id="th">Observaci&oacute;n</th>
	
	</tr>
    <tr>
<td id="th1">
<input type="text" name="cod_e" id="cod_e" maxlength="5" onKeyPress="return soloNumeros(event)" tabindex=1>
</td>


<td id="th1">
<select id="accion_de_entrada" name="accion_de_entrada" disabled="disabled" tabindex=5>
<option></option>
<option value="donacion">Donaci&oacute;n</option>
<option value="despacho">Despacho</option>
<option value="traspaso almacen">Traspaso por almacen</option>
<option value="devolucion de mercancia">Devoluci&oacute;n de mercancia</option>
<option value="desincorporacion por inservibilidad">Desincorporaci&oacute;n por inservibilidad</option>
</select>
</td>

<td id="th1">
<input type="text" name="proveedor" disabled="disabled" value="PROSALUD" id="proveedor"tabindex=7></label>
</td>
<td id="th1">
<input id="fecha_e" type="text" name="fecha_e" disabled="disabled" maxlength="10"onkeypress="return soloNumeros(event)"tabindex=8>
</td>

<td id="th1">
<input type="text" name="observacion" disabled="disabled" id="observacion"onkeypress="return soloLetras(event)"tabindex=10>
</td>
</tr>
</table>
</div>

<br>
<div id="form-2">
<table id="tabla">
<tr>
    <td id="th">Producto</th>
	<td id="th">Lote</th>
    <td id="th">Cantidad de Entrada</th>
	<td id="th">Fecha de Vencimiento</th>
	
	</tr>
<td id="th1">
<input type="text" name="cod_i" id="cod_i" maxlength="5" disabled="disabled" onKeyPress="return soloNumeros(event)" tabindex=1>
</td>
<td id="th1">
<input type="text" name="lote" id="lote" maxlength="5" disabled="disabled" onKeyPress="return soloNumeros(event)" tabindex=3></label>
</td>
<td id="th1">
<input type="text" name="cantidad_entrada" disabled="disabled" id="cantidad_entrada"onkeypress="return soloNumeros(event)" tabindex=4>
</td>
<td id="th1">
<input id="fecha_v" type="text" name="fecha_v" disabled="disabled" maxlength="10"onkeypress="return soloNumeros(event)"tabindex=9>
</td>
</td>
</tr>
</table>
</div>
</form>

<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario1" value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario1" >
</ul>

</div>  
</div>
</div>
</div>
</body>
</html>