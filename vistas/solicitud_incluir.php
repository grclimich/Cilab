<?php
   session_start();
    if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
    include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include("../modelos/clase_solicitud.php");
	$solicitud=new solicitud();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet"  type="text/css" href="../css/formularioentrada.css">
<link rel="stylesheet"  type="text/css" href="../css/factura_solicitud.css">
<script type="text/javascript" src="../js/campovacio.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>

<style type="text/css">@import url("../css/calendar-blue.css");</style>	
<script type="text/javascript" src="../js/calendario.js"></script>
<title>SOLICITUD</title>
</head>
<body onLoad="document.formulario9.nro_solicitud.focus();">

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
	    
<form id="formulario9" name="formulario9" method="post" action="../controladores/solicitud_incluirBD.php"  onSubmit="return validar9()">
<div id="form-1">
<table id="tabla"><tr>
    <td id="th">Nro Solicitud</td>
    <td id="th">Nombre Laboratorio</td>
	<td id="th">Fecha de Solicitud</td>
	<td id="th">Status</td>
	</tr>
	<tr>
    <td id="th1"><?php

  echo"<input value=".$_SESSION['nro_solicitud']." name='nro_solicitud' id='nro_solicitud' type='text' readonly='readonly'>";
  
?></td>

    <td id="th1"><?php
echo "<select name='cod_r' id='cod_r'>";
$str="SELECT cod_r, nombre_2 FROM `laboratorio_receptor` ORDER BY `nombre_2` ASC "; 
$resp=mysql_query($str);
	echo "<option>Seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_r=$data["cod_r"];
			$nombre_2=$data["nombre_2"];
			echo "<option value=".$cod_r.">".$nombre_2."</option>";
		}?></td>
	
	<td id="th1"><input id="fecha_solicitud" type="text" name="fecha_solicitud" maxlength="10" onKeyPress="return soloLetrasnumeros(event)"tabindex=8 readonly="readonly" >

<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_solicitud",     
ifFormat       :    "%d-%m-%Y",   
showsTime      :    false,        
button         :    "button",   
singleClick    :    true,          
step           :    1             
    }
);
</script>
</td>
	<td id="th1"><input type="text" name="status" id="status"onkeypress="return soloLetras(event)"tabindex=10></td>
	</tr>
	</table>
</div>

<br>
<div id="form-2">
<table id="tabla">
<tr>
	<td id="th">Productos</td>
    <td id="th">Cantidad</td>
	</tr>
	<tr>
	<td id="th1"><?php
echo "<select name='cod_i' id='cod_i'>";
$str="SELECT cod_i, descripcion FROM `insumo` ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
	echo "<option>Seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			echo "<option value=".$cod_i.">".$descripcion."</option>";
		}?></td>
	
	<td id="th1"><input id="cantidad" type="text" name="cantidad" maxlength="10" onKeyPress="return soloNumeros(event)"tabindex=8></td>
	</tr>
	</table>
	</div>






</form>
<ul class="center2">
<input  class="vertical" name="incluir" id="incluir" type="submit"  value="Agregar" form="formulario9">
<ul>

<div class="datagrid" id="lista">
<legend class="leg" style="color:#FFF">SOLICITUD</legend>
<div style class="barralateral">
<table>
<div class="tab">
  <thead><tr>
    <th>id producto</th>
    <th>nombre</th>
    <th>cantidad</th>
	</tr>
	</thead>
	</div>
	<?php
	$num=$_SESSION['nro_solicitud'];
  
  $buscar="SELECT soli_pro.cod_i,  insumo.descripcion,  soli_pro.cantidad   FROM soli_pro, insumo WHERE insumo.cod_i = soli_pro.cod_i and soli_pro.nro_solicitud = '$num' ORDER BY soli_pro.nro_solicitud ASC ";
$tabla=mysql_query($buscar);
  

	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><td>".$row["cod_i"]."</td><td>".$row["descripcion"]."</td><td>".$row["cantidad"]."</td></tr><tbody>";
	}

	?>
</div>
</table>
</div>  
</div>
<br>
<ul class="center6">
<input  class="vertical" name="incluir2" id="modificar" type="submit" value="Incluir" form="formulario9" disabled="disabled" >
</ul>
</div>

</div>
</body>
</html>
