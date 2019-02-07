<?php 
 
    session_start();
	if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
   include("../BD.php");
  $obj=new conexion();
  $obj->conectar();
  include("../modelos/clase_entrada_insumo.php");
  $entrada_insumo=new entrada_insumo();
  ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet"  type="text/css" href="../css/formularioentrada.css">
<link rel="stylesheet"  type="text/css" href="../css/factura_entrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/calendario.js"></script>
<script type="text/javascript" src="../js/entrada_insumo.js"></script>
<style type="text/css">@import url("../css/calendar-blue.css");</style>
<title>ENTRADAS</title>
</head>	

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
	<br>
	
 <form id="formulario1" name="formulario1" method="post" action="../controladores/entrada_insumo_incluirBD.php"  onSubmit="return valFechas()" onSubmit="return confirm('Desea Ejecutar la Orden?')">
<div id="form-1">
<table id="tabla">
<tr>
    <td id="th">Nro de entrada</th>
    <td id="th">Acci&oacute;n de Entrada</th>
	<td id="th">Proveedor</th>
	<td id="th">Fecha de Entrada</th>
	<td id="th">Observaci&oacute;n</th>
	
	</tr>
	<tr>
    <td id="th1"><?php
$entrada_insumo->contar();
$consulta="SELECT cod_e FROM entrada_insumo";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input value=".$num." name='cod_e' id='cod_e' type='text' readonly='readonly'>";
?></td>



<td id="th1"><?php
echo "<select name='accion_de_entrada' id='accion_de_entrada'>";
$str="SELECT id_e,razon_entrada FROM `accion_entrada` ORDER BY `razon_entrada` ASC "; 
$resp=mysql_query($str);
	echo "<option>Seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$id_e=$data["id_e"];
			$razon_entrada=$data["razon_entrada"];
			echo "<option value=".$id_e.">".$razon_entrada."</option>";
}?></td>

<td id="th1"><input type="text" name="proveedor" value="PROSALUD" readonly='readonly' onKeyPress="return soloLetrasnumeros(event)"id="proveedor"tabindex=7></label></td>

<td id="th1">
<input id="fecha_e" type="text" name="fecha_e" readonly='readonly' maxlength="10" tabindex=8>
<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_e",     
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
<input type="text" name="observacion" id="observacion"onkeypress="return soloLetras(event)"tabindex=10>
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
    <td id="th">Fecha de Vencimiento</td>
	</tr>
	<tr>

<td id="th1"><input type="text" name="lote" id="lote"onkeypress="return soloNumeros(event)" tabindex=3></label></td>	
	
<td id="th1"><?php

echo "<select name='cod_i' id='cod_i'>";
$str="SELECT insumo.cod_i, insumo.descripcion, presentacion.clase_presentacion FROM insumo, presentacion  where insumo.presentacion= presentacion.cod_presentacion ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
	echo "<option>Seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			$pre=$data["clase_presentacion"];
			echo "<option value=".$cod_i.">".$descripcion."--".$pre."</option>";
		}?>
		</td>
		

<td id="th1"><input type="text" name="cantidad_entrada" id="cantidad_entrada"onkeypress="return soloNumeros(event)" tabindex=4></td>

<td id="th1"><input id="fecha_v" type="text" name="fecha_v"readonly='readonly'   maxlength="10" tabindex=9>
<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_v",     
ifFormat       :    "%d-%m-%Y",   
showsTime      :    false,        
button         :    "button",   
singleClick    :    true,          
step           :    1             
    }
);
</script>
</td>
</tr>
</table>
</div>
</form>
<ul class="center2">
<input class="vertical" name="incluir" id="incluir" type="submit"  value="Agregar" form="formulario1">
</ul>
<div class="datagrid" id="lista">
<legend class="leg" style="color:#FFF">ENTRADAS</legend>
<div style class="barralateral">
<table id="tabla2">
  <thead><tr>
	<th>Lote</th>
	<th>Productos</th>
	<th>Presentacion</th>
    <th>Cantidad</th>
   	<th>Fecha de<br>Vencimiento</th>
	</tr>
	</thead>
	
	<?php
        
$buscar="SELECT insumo.descripcion, presentacion.clase_presentacion, entrada_pro.cantidad_entrada, entrada_pro.lote, entrada_pro.fecha_v  FROM entrada_pro, insumo, presentacion WHERE insumo.cod_i = entrada_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and entrada_pro.cod_e = '$num'";
$tabla=mysql_query($buscar);
  

	
	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><td>".$row["lote"]."</td><td>".$row["descripcion"]."</td><td>".$row["clase_presentacion"]."</td><td>".$row["cantidad_entrada"]."</td><td>".$row["fecha_v"]."</td></tr><tbody>";
	}

	?>
</table>
</div>
</div>  
<br>
<ul class="center2">
<input  class="vertical" name="incluir2" id="incluir2" type="submit" disabled="disabled" value="Incluir" form="formulario1" >
</ul>
</div>
</div>
</div>
</body>
</html>
