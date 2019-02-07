<?php
   session_start();
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formulariosalida.css">
<link rel="stylesheet"  type="text/css" href="../css/factura_salida.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>formulario de salida</title>
</head>
<script>
function validar(formulario2){
	if(document.formulario2.cod_s.value==""){
		alert("Debe ingresar algun codigo");
		return false;
	}else{
	return true;
		}
}
</script>
<body onLoad="document.formulario2.cod_s.focus();">
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
    
<form id="formulario2" name="formulario2" method="post" action="../controladores/consultar_salida_insumoBD.php" onSubmit="return validar()">
<div id="form-1">
<table id="tabla">
<tr>
    <td id="th">Codigo solicitud</th>
    <td id="th">Nro solicitud</th>
    <td id="th">Acci&oacute;n de salida</th>
    <td id="th">Lab.Receptor</th>
    <td id="th">Fecha de salida</th>
    <td id="th">Observaci&oacute;n</th>
	
	</tr>
	<tr>


<td id="th1">
<input type="text" name="cod_s" id="cod_s" maxlength="5" onKeyPress="return soloNumeros(event)"tabindex=1>
</td>

<td id="th1">
<input type="text" name="nro_salida" disabled="disabled" id="nro_salida"tabindex=5>
</td>

<td id="th1">
<select name="accion_de_salida" disabled="disabled" tabindex=4>
</td>

<td id="th1">
<input type="text" name="laboratorio_r"id="laboratorio_r" disabled="disabled" tabindex=6>
</td>

<td id="th1">
<input type="text" name="fecha_s" id="fecha_s" disabled="disabled" value="" readonly maxlength="10"onkeypress="return soloLetrasnumeros(event)"tabindex=7>
<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_s",     
ifFormat       :    "%d-%m-%Y",   
showsTime      :    false,        
button         :    "button",   
singleClick    :    true,          
step           :    1             
    }
);
</script>
</td>
<td id="th1">
<input type="text" disabled="disabled" name="observaciones"id="observaciones"onkeypress="return soloLetras(event)"tabindex=8>
</td>
</tr>
</table>
</div>
<br>
<div id="form-2">
<table id="tabla">
<tr>

    <td id="th">Producto</th>
    <td id="th">Cantidad de salida</th>
	
</tr>
<tr>
<td id="th1">
<input type="text" name="cod_i" id="cod_i" maxlength="5" disabled="disabled" onKeyPress="return soloNumeros(event)"tabindex=1>
</td>

<td id="th1">
<input type="text" name="cantidad_salida" id="cantidad_salida" disabled="disabled" tabindex=3>
</td>
</tr>
</table>
</div>
</form>

<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario2" value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario2" >
</ul>
</div>
</div>
</div>
</body>
</html>
