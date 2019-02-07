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

<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../js/calendario.js"></script>
<script type="text/javascript" src="../js/entrada_insumo.js"></script>
<title>formulario de entrada</title>
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
<form id="formulario1" name="formulario1" method="post" action="../controladores/entrada_insumo_modificarBD.php"  onSubmit="return validar()">
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
     <td id="th1"><?php echo '<input name="cod_e" type="text" id="cod_e"  value="'.$_SESSION['cod_e'].'" disabled="disabled">'; ?>
      
    </td>

<td id="th1">
<?php
$id_pres=$_SESSION['accion_de_entrada'];
$str1="SELECT razon_entrada FROM `accion_entrada` WHERE `id_e`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='accion_de_entrada' id='accion_de_entrada'>";
$str="SELECT id_e,razon_entrada FROM `accion_entrada` ORDER BY `razon_entrada` ASC "; 
$resp=mysql_query($str);
while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["razon_entrada"]."</option>";
		}
	echo "<option>-------------------</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$id_e=$data["id_e"];
			$razon_entrada=$data["razon_entrada"];
			echo "<option value=".$id_e.">".$razon_entrada."</option>";
}?>
</td>
<td id="th1">
<?php echo '<input name="proveedor" type="text" id="proveedor" readonly="readonly" onKeyPress="return soloLetrasnumeros(event)"value="'.$_SESSION['proveedor'].'" /> ';?>
</td>
<td id="th1">
<?php echo '<input name="fecha_e" type="text" id="fecha_e" readonly="readonly" onKeyPress="return soloLetrasnumeros(event)" value="'.$_SESSION['fecha_e'].'" /> ';?>

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
<?php echo '<input name="observacion" type="text" id="observacion" onKeyPress="return soloLetras(event)" value="'.$_SESSION['observacion'].'" "tabindex=10" /> ';?>
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
	<tr>
<td id="th1">
<?php
$id_pres=$_SESSION['cod_i'];
$str1="SELECT descripcion FROM `insumo` WHERE `cod_i`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='cod_i' id='cod_i'>";
$str="SELECT cod_i, descripcion FROM `insumo` ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["descripcion"]."</option>";
		}
	echo "<option>-------------------</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			echo "<option value=".$cod_i.">".$descripcion."</option>";
		}?>
      
    </td>
    <td id="th1">
<?php echo '<input name="lote" type="text" id="lote" onKeyPress="return soloNumeros(event)" value="'.$_SESSION['lote'].'" /> ';?>
</td>    
<td id="th1">
<?php echo '<input name="cantidad_entrada" type="text" id="cantidad_entrada" onKeyPress="return soloNumeros(event)" value="'.$_SESSION['cantidad_entrada'].'" /> ';?>
</td>
<td id="th1">
<?php echo '<input name="fecha_v" type="text" readonly="readonly" id="fecha_v" onKeyPress="return soloLetrasnumeros(event)" value="'.$_SESSION['fecha_v'].'" /> ';?>
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
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario1" value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" form="formulario1"  value="Modificar" >
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario1" disabled="disabled">
</ul>

</div>  
</div>
</div>
</div>
</body>
</html>