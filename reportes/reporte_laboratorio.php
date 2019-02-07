<?php
   session_start();

   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	
    include("../BD.php");
	$obj=new conexion();
    $obj->conectar();

?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/insumo.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../funciones.js"></script>
<title>LABORATORIOS RECEPTORES</title>
</head>
<body>
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

<form id="formulario4" name="formulario4" method="post" action="reporte_laboratorioBD.php"  onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc">
<table width="465" height="188" align="center">

<legend>REPORTE DE LABORATORIOS RECEPTORES</legend>
<tr>
<td>Municipio:
<td>
            <select name="municipio" id="municipio">
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
</tr>
		</table>
</form>

</fieldset>
<ul class="center2">
<input  class="vertical" name="Buscar" type="submit" form="formulario4" value="Buscar">
</ul>
<br>
<ul class="center7">
<input  class="vertical3" name="Buscar" type="submit" value="TODOS LOS LABORATORIOS" onclick = "location='reportevertodolaboratorio.php'">

</ul>

</div>
</div>
</div>
</body>
</html>
