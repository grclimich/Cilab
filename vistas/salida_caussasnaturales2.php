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
	include("../modelos/clase_insumo.php");
    $salida_insumo=new salida_insumo();
?>
<html>
<head>
<style type="text/css">@import url("../css/calendar-blue.css");</style>
<link rel="stylesheet"  type="text/css" href="../css/formulariosalida.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<link rel="stylesheet"  type="text/css" href="../css/factura_salida2.css">
<script type="text/javascript" src="../js/calendario.js"></script>
<title>formulario de salida</title>
</head>
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
    <br>  
<form id="formulario2" name="formulario2" method="post" action="../controladores/salida_caussasnaturalesBD.php" onSubmit="return confirm('Desea Ejecutar la Orden?')" onSubmit="return validar()">
<div id="form-1">
<table id="tabla">
<tr>
    <td id="th">Nro Salida</th>
    <td id="th">Acci&oacute;n de salida</th>
    <td id="th">Fecha de salida</th>
    <td id="th">Observaci&oacute;n</th>
	
	</tr>
	<tr>
<td id="th1">
<?php
$num=$_SESSION['cod_s'];
  echo"<input value=".$num." name='cod_s' id='cod_s' type='text' readonly='readonly'>";
?>
</td>

<td id="th1">

<?php
 echo"<input value='Causas Naturales' name='accion_de_salida' id='accion_de_salida' type='text' readonly='readonly'>";
  
?>
</td>
<td id="th1"><?php

  echo"<input value=".$_SESSION['fecha_s']." name='fecha_s' id='fecha_s' type='text' readonly='readonly'>";
  
?>
</td>
<td id="th1">
<?php

  echo"<input value=".$_SESSION['observaciones']." name='observaciones' id='observaciones' type='text' readonly='readonly'>";
  
?>

</td>
</tr>
</table>
</div>
<br>
<div id="form-2">
<table id="tabla">
<tr>
	<td id="th">Lote</td>
	<td id="th">Producto</td>
    <td id="th">Cantidad</td>
	</tr>
	<tr>

	
<td id="th1"><input type="text" name="lote" id="lote"onkeypress="return soloNumeros(event)" tabindex=3></label></td>
	
<td id="th1">
<?php
echo "<select name='cod_i' id='cod_i'>";
$str="SELECT insumo.cod_i, insumo.descripcion, presentacion.clase_presentacion FROM insumo, presentacion  where insumo.presentacion= presentacion.cod_presentacion ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
	echo "<option>seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			$pre=$data["clase_presentacion"];
			echo "<option value=".$cod_i.">".$descripcion."--".$pre."</option>";
		}?>

</td>
<td id="th1">
<input type="text" name="cantidad_salida" id="cantidad_salida" onblur="valida(this.value)" onkeypress="return soloNumeros(event)"tabindex=3></td>

	</tr>
	</table>
	</div>

	
</form>
<ul class="center2">
<input  class="vertical" name="incluir" id="incluir" type="submit"  value="Agregar" form="formulario2">
</ul>
<div class="datagrid" id="lista">
<legend class="leg" style="color:#FFF">SALIDA</legend>
<div style class="barralateral">
<table>
  <thead><tr>
    <th>Productos</th>
	<th>Presentaci&oacute;n</th>
    <th>Cantidad</th>
	</tr>
	</thead>
	
	<?php
	$num=$_SESSION['cod_s'];
  
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
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario2" value="Incluir">
</ul>
</div>
</div>
</div>
</body>
</html>
