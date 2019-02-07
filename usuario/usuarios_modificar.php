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
<script type="text/javascript" src="../js/funciones.js"></script>
<title>Registrar Usuarios</title>
</head>
<script>
function validar1(formulario){
				var bOk = false; 
        nombre_usuario= document.getElementById("nombre_usuario").value; 
        pass= document.getElementById("pass").value; 
       /**************************************/
if( nombre_usuario == null || nombre_usuario.length == 0 || /^\s+$/.test(nombre_usuario) ) {
 alert('Introduzca un Nombre de Usuario');
 document.getElementById("nombre_usuario").focus();
  return false;
} /******************COMPRUEBA el pass********************/
else if( pass == null || pass == 0 || pass.length == 0 || /^\s+$/.test(pass) ) {
 alert('Introduzca una clave');
 document.getElementById("pass").focus();
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

<form id="formulario" name="formulario" method="post" action="usuarios_modificarBD.php"  onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc">
<legend>USUARIO</legend>
<table width="340" height="188" align="center">
<tr>
<td><label for="nombre_usuario">Nombre de Usuario:
<td><?php echo '<input name="nombre_usuario" type="text"  id="nombre_usuario"  onKeyPress=" return soloLetras(event)" value="'.$_SESSION['nombre_usuario'].'" /> ';?><td>
</tr>
<tr>
<td><label for="pass">Contrase&ntilde;a:
<td><?php echo '<input name="pass" type="text" id="pass" value="'.$_SESSION['pass'].'" /> ';?></td>
</tr>
</table>
</fieldset>
</form>
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