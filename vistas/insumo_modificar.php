<?php
    session_start();
	 if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include("../modelos/clase_insumo.php");
	$insumo=new insumo();
	  ?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/insumo.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>formulario de insumo</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=720,height=380, scrollbars=1') ; 
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

<form id="formulario" name="formulario" method="post" action="../controladores/insumo_modificarBD.php" onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc" >
<legend>PRODUCTO</legend>
<table width="340" height="188" align="center">
<tr>
<td><label for="cod_i">C&oacute;digo:
<td><?php echo '<input name="cod_i" type="text" id="cod_i"  value="'.$_SESSION['cod_i'].'" disabled="disabled" />'; ?>
</tr>   

<tr>
<td><label for="descripcion">Descripci&oacute;n:</td>
<td><?php echo '<input name="descripcion" type="text" id="descripcion" value="'.$_SESSION['descripcion'].'" /> ';?>
</tr>     
<tr><td><label for="tipo_p">Tipo de Producto:</td>
<td>
<select name="tipo_p" id="tipo_p">
<?php echo '<option value="'.$_SESSION['tipo_p'].'">'.$_SESSION['tipo_p'].'</option>';?>
<option>-----------------------------</option>
<option value="Insumos">Insumos</option>
<option value="Reactivos">Reactivos</option>
<option value="Materiales">Materiales</option>
</select></td>
 
<tr>
<td><label for="presentacion">Presentaci&oacute;n:</label>
<td>
<?php
$id_pres=$_SESSION['presentacion'];
$str1="SELECT clase_presentacion FROM `presentacion` WHERE `cod_presentacion`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='presentacion' id='presentacion'>";
$str="SELECT cod_presentacion,clase_presentacion FROM `presentacion` ORDER BY `clase_presentacion` ASC "; 
$resp=mysql_query($str);
 while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["clase_presentacion"]."</option>";
		}
	echo "<option value='0'>-------------------</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_presentacion=$data["cod_presentacion"];
			$clase_presentacion=$data["clase_presentacion"];
			echo "<option value=".$cod_presentacion.">".$clase_presentacion."</option>";
		}?>
</tr>
<tr>
<td><label for="almacen">Almacen:</td>

<td>
      <?php echo '<input name="almacen" type="text" readonly="readonly" id="almacen" onKeyPress="return soloLetrasnumeros(event)" value="Coordinaci&oacute;n de Laboratorios"'.$_SESSION['almacen'].'" /> ';?>
      
    </td>
<tr>
<td><label for="observacion">Observaci&oacute;n:</td>
<td>
      
      <?php echo '<input name="observacion" type="text" id="observacion" value="'.$_SESSION['observacion'].'" /> ';?>
      
</td>
</table>
</form>
<a href="javascript:abrir('../reportes/ver_productos.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Productos">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario" value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" form="formulario" type="submit" value="Modificar">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario" disabled="disabled" >
</ul>
</div>
</div>
</div>
</body>
</html>
