<?php
    session_start();
	include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('POR FAVOR inicie sesion...') </script>";
    }
	
	else if( $_SESSION['id_perfil']==2){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../menu/menu2.php'>";
	echo "<script> alert('Para entrar debes ser administrador') </script>";
	}
	include ("../modelos/clase_laboratorio.php");
	$laboratorio=new laboratorio(); 
	?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/estilos2.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/laboratorio.js"></script>
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
<form id="formulario3" name="formulario3" method="post" action="../controladores/laboratorio_incluirBD.php"  onSubmit="return validar20()">
<fieldset style="border:1px solid #2175bc"> 
<legend>LABORATORIOS RECEPTORES</legend>
<table width="325" height="188" align="center">

<tr>
<td><label for="cod_r">C&oacute;digo:</td>
<td>
<?php
$laboratorio->contar();
$consulta="SELECT cod_r FROM laboratorio_receptor";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input value=".$num." name='cod_r' id='cod_r' type='text' readonly='readonly'></tr>";
?>

</td>
<tr>
<td><label for="nombre_2">Nombre:
<td><input type="text" name="nombre_2" id="nombre_2" onKeyPress="return soloLetras(event)"tabindex=2></label></td>
<tr>
<td><label for="direccion">Direcci&oacute;n:
<td><input type="text" name="direccion"id="direccion" tabindex=3></td>
<tr>
<td><label for="municipio">Municipio:
<td>        <select name="municipio" id="municipio">
			<option></option>
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
<td><label for="telefono">Tel&eacute;fono:
<td><input type="text" name="telefono"id="telefono" maxlength="11" onKeyPress="return soloNumeros(event)"tabindex=4></td>
<tr>
<td><label for="nro_fax">Nro de Fax:
<td><input type="text" name="nro_fax" id="nro_fax" onKeyPress="return soloNumeros(event)"tabindex=5></td>
<tr>
<td><label for="nro_rif">Nro de Rif:
<td><input type="text" name="nro_rif" id="nro_rif" maxlength="11"tabindex=6></td>
</tr>
</table>
</form>

<a href="javascript:abrir('../reportes/ver_laboratorios.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Registro de laboratorios">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario3" value="Incluir">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" onclick = "location='../vistas/FORMULARIO_LABORATORIO.php'"/>
</ul>
</div>
</div>
</div>
</body>
</html>