<?php
    session_start();
	include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include("../modelos/clase_insumo.php");
	$insumo=new insumo();
	
		if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('POR FAVOR inicie sesion...') </script>";
    }
	
	else if( $_SESSION['id_perfil']==2){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../menu/menu2.php'>";
	echo "<script> alert('Para entrar debes ser administrador') </script>";
	}
	
	  ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/estilos2.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/producto.js"></script>
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

<form id="formulario" name="formulario" method="post" action="../controladores/insumo_incluirBD.php" onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc">
<legend>PRODUCTO</legend>
<table width="460" height="188" align="center">
<tr>
<td><label for="cod_i">C&oacute;digo:<td>
<?php
$insumo->contar();
$consulta="SELECT cod_i FROM insumo";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input type'text' value=".$num." name='cod_i' id='cod_i' readonly='readonly' ></tr>";
 
?>

<tr>
<td><label for="descripcion">Descripci&oacute;n:</td>
<td><input type="text" name="descripcion" id="descripcion"  tabindex=2></label></td>
<tr>
<td><label for="tipo_p">Tipo de Producto:</td>
<td>
<select name="tipo_p" id="tipo_p" tabindex=3>
<option value="Selecionar..."></option>
<option value="Insumos">Insumos</option>
<option value="Reactivos">Reactivos</option>
<option value="Materiales">Materiales</option>
</select></td>
<tr>
<td><label for="presentacion">Presentaci&oacute;n:</label>
<td>
<?php
echo "<select name='presentacion' id='presentacion'>;'>";
$str="SELECT cod_presentacion,clase_presentacion FROM `presentacion` ORDER BY `clase_presentacion` ASC "; 
$resp=mysql_query($str);
	echo "<option value='0'>Seleccionar</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_presentacion=$data["cod_presentacion"];
			$clase_presentacion=$data["clase_presentacion"];
			echo "<option value=".$cod_presentacion.">".$clase_presentacion."</option>";
		}?>
       
<tr>
<td><label for="almacen">Almacen:</td>
<td><input type="text" name="almacen" readonly id="almacen"value="Coordinacion de Laboratorios" onKeyPress="return soloLetrasnumeros(event)" tabindex=4></td>
<tr>
<td><label for="observacion">Observaci&oacute;n:</td>
<td><input type="text" name="observacion" id="observacion" onKeyPress="return soloLetras(event)"tabindex=5></td>
</table>
</form>
<a href="javascript:abrir('../reportes/ver_productos.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Productos">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario" value="Incluir">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" onclick = "location='FORMULARIOINSUMO.php'"/>
</ul>


</div>
</div>
</div>
</body>
</html>