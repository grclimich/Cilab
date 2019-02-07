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
<script type="text/javascript" src="../funciones.js"></script>
<script type="text/javascript" src="../campovacio.js"></script>
<title>Registrar Usuarios</title>
</head>

<body onLoad="document.formulario.nombre_usuario.focus();">
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

<form id="formulario" name="formulario" method="post" action="usuarios_incluirBD.php" onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc">
<legend>USUARIO</legend>
<table width="340" height="188" align="center">
<tr>
<td><label for="nombre_usuario">Nombre de Usuario:
<td><?php echo '<input name="nombre_usuario" type="text" id="nombre_usuario" disabled="disabled" value="'.$_SESSION['nombre_usuario'].'" /> ';?></td>
</tr>
<tr>
<td><label for="pass">Contrase&ntilde;a:
<td><input name="pass" type="password" id="pass"></td>
</tr>
</table>
</fieldset>
</form>
<ul class="center">

<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario" value="Incluir">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
</ul>
</div>
</div>
</div>
</body>
</html>