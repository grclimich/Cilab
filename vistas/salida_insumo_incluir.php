<?php
   session_start();
    if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
   	include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include("../modelos/clase_salida_insumo.php");
    $salida_insumo=new salida_insumo();
?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formulariosalida.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<link rel="stylesheet"  type="text/css" href="../css/factura_salida.css">
<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../js/calendario.js"></script>
<title>formulario de salida</title>
</head>
<script>
function validar(formulario2){
	if(document.formulario2.nro_solicitud.selectedIndex==0){
		alert("Introduzca un numero de solicitud");
		return false;
	}else{
	return true;	
		}
}
</script>
<script>
function valida(valor){

	if(document.formulario2.cantidad_salida.value>document.formulario2.cantidad.value){
		alert("sobrepasa la cantidad");
		document.formulario2.cantidad_salida.value=0;
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
<form id="formulario2" name="formulario2" method="post" action="salida_insumo_incluir2.php" onSubmit="return validar()">
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


<td id="th1"><?php

$salida_insumo->contar();
$consulta="SELECT cod_s FROM salida_insumo";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input value=".$num." name='cod_s' id='cod_s' type='text' readonly='readonly'>";
?>
</td>

<td id="th1"><?php
echo "<select name='nro_solicitud' id='nro_solicitud'>";
$str="SELECT nro_solicitud,nro_solicitud FROM `solicitud` ORDER BY `nro_solicitud` ASC "; 
$resp=mysql_query($str);
	echo "<option></option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$nro_solicitud=$data["nro_solicitud"];
			$nro_solicitud=$data["nro_solicitud"];
			echo "<option value=".$nro_solicitud.">".$nro_solicitud."</option>";
		}?></td>


<td id="th1"><?php
echo "<select name='accion_de_salida' disabled='disabled' id='accion_de_salida'>";
$str="SELECT id_s,razon_salida FROM `accion_salida` ORDER BY `razon_salida` ASC "; 
$resp=mysql_query($str);
	echo "<option></option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$id_s=$data["id_s"];
			$razon_salida=$data["razon_salida"];
			echo "<option value=".$id_s.">".$razon_salida."</option>";
		}?></td>

<td id="th1"><?php
echo "<select name='cod_r' disabled='disabled' id='cod_r'>";
$str="SELECT cod_r, nombre_2 FROM `laboratorio_receptor` ORDER BY `nombre_2` ASC "; 
$resp=mysql_query($str);
	echo "<option></option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_r=$data["cod_r"];
			$nombre_2=$data["nombre_2"];
			echo "<option value=".$cod_r.">".$nombre_2."</option>";
		}?></td>
<td id="th1"><input type="text" disabled='disabled' name="fecha_s" id="fecha_s" value="" readonly maxlength="10"onkeypress="return soloLetrasnumeros(event)"tabindex=7>
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
<td id="th1"> <input type="text" disabled='disabled' name="observaciones"id="observaciones"onkeypress="return soloLetras(event)"tabindex=8>
</td>
</tr>
</table>
</div>
</form>

<br>
<div id="form-2">
<table id="tabla">
<tr>

    <td id="th">Producto</th>
    <td id="th">Cantidad de salida</th>
	
	</tr>
	<tr>
	<td id="th1"><?php
echo "<select name='cod_i' id='cod_i' disabled='disabled' >";
$str="SELECT cod_i, descripcion,n_cantidad FROM `insumo` ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
	echo "<option></option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			$cantidad=$data["n_cantidad"];
			echo $cantidad;
			echo "<option value=".$cod_i.">".$descripcion."".$cantidad."</option>";
		}?></td>
<td id="th1">
<input type="hidden" disabled='disabled' name="cantidad" disabled='disabled' id="cantidad_salida" value=".$cantidad.">
<input type="text" name="cantidad_salida" disabled='disabled' id="cantidad_salida" onBlur="valida(this.value)" onKeyPress="return soloNumeros(event)"tabindex=3></td>
	</tr>
	</table>
	</div>
	<br>
<ul class="center2">
<input class="vertical" name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario2">
</ul>
</div>
</div>
</div>
</body>
</html>
