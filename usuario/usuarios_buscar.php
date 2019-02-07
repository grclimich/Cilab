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
	
	  ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet"  type="text/css" href="../css/insumo.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../campovacio.js"></script>
<title>Registrar Usuarios</title>
</head>
<script>
function validar1(formulario){
				var bOk = false; 
        nombre_usuario= document.getElementById("nombre_usuario").value; 
       /******************COMPRUEBA la accion_de_salida********************/
if( nombre_usuario == null || nombre_usuario.length == 0 || /^\s+$/.test(nombre_usuario) ) {
 alert('Introduzca un Nombre de Usuario');
 document.getElementById("nombre_usuario").focus();
  return false;
}
}
</script>

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

<form id="formulario" name="formulario" method="post" action="usuarios_buscarBD.php" onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc">
<legend>USUARIO</legend>
<table width="340" height="188" align="center">
<tr>
<td><label for="nombre_usuario">Nombre de Usuario:
<td><input name="nombre_usuario" type="text" id="nombre_usuario" onKeyPress=" return soloLetras(event)"></td>
</tr>
</table>
</fieldset>
</form>
<ul class="center2">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario">
</ul>
</div>
</div>
</div>
</body>
</html>