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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../js/campovacio.js"></script>
<link rel="stylesheet"  type="text/css" href="../css/factura_salida.css">
<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../js/calendario.js"></script>
<title>formulario de salida</title>
</head>
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
     
<form id="formulario2" name="formulario2" method="post" action="../controladores/salida_insumo_incluirBD.php"  onSubmit="return validar10()">
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
$num=$_POST['cod_s'];
  echo"<input value=".$num." name='cod_s' id='cod_s' type='text' readonly='readonly'>";
?></td>

<td id="th1"><?php
$nro_solicitud=$_POST['nro_solicitud'];
echo"<input value=".$nro_solicitud." name='nro_solicitud' id='cod_s' type='text' readonly='readonly'>";
		?></td>



<td id="th1"><?php
echo "<select name='accion_de_salida' id='accion_de_salida'>";
$str="SELECT id_s,razon_salida FROM `accion_salida` ORDER BY `razon_salida` ASC "; 
$resp=mysql_query($str);
	echo "<option>Seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$id_s=$data["id_s"];
			$razon_salida=$data["razon_salida"];
			echo "<option value=".$id_s.">".$razon_salida."</option>";
		}?></td>

<td id="th1"><?php
$id_pres=$_SESSION['cod_r'];
$str1="SELECT nombre_2 FROM `laboratorio_receptor` WHERE `cod_r`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='cod_r' id='cod_r' readonly='readonly' >";
$str="SELECT cod_r, nombre_2 FROM `laboratorio_receptor` ORDER BY `nombre_2` ASC "; 
$resp=mysql_query($str);
while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["nombre_2"]."</option>";
		}
	?>
		</td>
<td id="th1">
<input type="text" name="fecha_s"  id="fecha_s" value="" readonly maxlength="10"onkeypress="return soloLetrasnumeros(event)"tabindex=7>
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
<td id="th1"> <input type="text"  name="observaciones"id="observaciones"onkeypress="return soloLetras(event)"tabindex=8>
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
<td id="th1"><?php

echo "<select name='cod_i' id='cod_i'>";
$str="SELECT soli_pro.cod_i, insumo.descripcion,soli_pro.cantidad FROM soli_pro,insumo  where insumo.cod_i=soli_pro.cod_i and soli_pro.nro_solicitud='$nro_solicitud' and soli_pro.status='Pendiente' ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
	echo "<option>Seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			$cantidad=$data["cantidad"];
			echo $cantidad;
			echo "<option value=".$cod_i.">".$descripcion." ".$cantidad."</option>";
		}?></td>

<td id="th1">
<input type="text" name="cantidad_salida" id="cantidad_salida" onKeyPress="return soloNumeros(event)"tabindex=3>
</td>
</tr>
</table>
</div>
</form>
<ul class="center2">
<input class="vertical" name="incluir" id="incluir" type="submit"  value="Agregar" form="formulario2">
</ul>
<div class="datagrid" id="lista">
<legend class="leg" style="color:#FFF">SALIDAS</legend>
<div style class="barralateral">
<table>
<div>
  <thead><tr>
    <th>Productos</th>
	<th>Presentaci&oacute;n</th>
    <th>Cantidad</th>
	</tr>
	</thead>
	
	<?php
	$num=$_POST['cod_s'];
  
$buscar="SELECT sali_pro.cod_i,  insumo.descripcion, presentacion.clase_presentacion, sali_pro.cantidad_salida   FROM sali_pro, insumo, presentacion WHERE insumo.cod_i = sali_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and sali_pro.cod_s = '$num'";
$tabla=mysql_query($buscar);
  	
	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><td>".$row["descripcion"]."</td><td>".$row["clase_presentacion"]."</td><td>".$row["cantidad_salida"]."</td></tr><tbody>";
	}

	?>
</table>
</div>
</div>
<br>
<ul class="center2">
<input  class="vertical" name="incluir2" id="incluir2" type="submit" value="Incluir" disabled="disabled" form="formulario2" >
</ul>
</div>
</body>
</html>