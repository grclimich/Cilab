<?php
    session_start();
	 if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include ("../modelos/clase_laboratorio.php");
	$laboratorio=new laboratorio(); 
	?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/insumo.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>formulario de receptores</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=720,height=380, scrollbars=1') ; 
} 
</script>
<body onLoad="document.formulario3.cod_r.focus();">

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
<form id="formulario3" name="formulario3" method="post" action="../controladores/laboratorio_modificarBD.php" onSubmit="return validar20()">
<fieldset style="border:1px solid #2175bc">
<legend>LABORATORIOS RECEPTORES</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="cod_r">C&oacute;digo:
<td>
      
     <?php echo '<input name="cod_r"  type="text" id="cod_r"  value="'.$_SESSION['cod_r'].'" disabled="disabled" />'; ?>
      
    </td>
<tr>
<td><label for="nombre_2">Nombre:</td><td>
      
      <?php echo '<input name="nombre_2" type="text" id="nombre_2" onKeyPress="return soloLetras(event)" value="'.$_SESSION['nombre_2'].'" /> ';?>
      
    </td>
<tr>
<td><label for="direccion">Direcci&oacute;n:</td><td>
      
      <?php echo '<input name="direccion" type="text" id="direccion" value="'.$_SESSION['direccion'].'" /> ';?>
      
    </td>
<tr>
<tr>
<td><label for="municipio">Municipio:</label>
<td><select name="municipio" id="municipio">			
			<?php echo '<option>'.$_SESSION['municipio'].' </option> ';?>
			<option>-----------------</option>
            <option>ARISTIDES BASTIDAS</option>
			<option>BOLIVAR</option>
            <option>BRUZUAL</option>
            <option>COCOROTE</option>
            <option>INDEPENDENCIA</option>
			<option>JOSE ANTONIO PAEZ</option>
			<option>LA TRINIDAD</option>
            <option>MANUEL MONGE</option>
            <option>NIRGUA</option>
            <option>PE&Ntilde;A</option>
            <option>SAN FELIPE</option>
			<option>SUCRE</option>
            <option>URACHICHE</option>
            <option>VEROES</option>
          </select></td>
		
<tr>
<td><label for="telefono">Tel&eacute;fono:</td><td>
      
      <?php echo '<input name="telefono" type="text" id="telefono" onKeyPress="return soloNumeros(event)" maxlength="11" value="'.$_SESSION['telefono'].'" /> ';?>
      
    </td>
<tr>
<td><label for="nro_fax">Nro de Fax:</td><td>
      
      <?php echo '<input name="nro_fax" type="text" id="nro_fax" onKeyPress="return soloNumeros(event)" value="'.$_SESSION['nro_fax'].'" /> ';?>
      
    </td>
<tr>
<td><label for="nro_rif">Nro de Rif:</td><td>
      
      <?php echo '<input name="nro_rif" type="text" id="nro_rif" value="'.$_SESSION['nro_rif'].'" /> ';?>
      
    </td>
<tr>
</table>
</form>
<a href="javascript:abrir('../reportes/ver_laboratorios.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Registro de laboratorios">
</fieldset>

<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit"  value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" form="formulario3">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" disabled="disabled" >

</div>
</div>

</div>
</body>
</html>