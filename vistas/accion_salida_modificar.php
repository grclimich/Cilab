<?php 
 
    session_start();
	if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
    }
?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionsalida.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>Accion de Salida</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=420,height=280, scrollbars=1') ; 
} 
</script>

<script>
function validar(formulario5){
				var bOk = false; 
        razon_salida= document.getElementById("razon_salida").value; 
       /******************COMPRUEBA la accion_de_salida********************/
if( razon_salida == null || razon_salida.length == 0 || /^\s+$/.test(razon_salida) ) {
 alert('Introduzca un ID');
 document.getElementById("razon_salida").focus();
  return false;
}
}
</script>
<body onLoad="document.formulario5.razon_salida.focus();">

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
<form id="formulario5" name="formulario5" method="post" action="../controladores/accion_salida_modificarBD.php"onSubmit="return validar3()">
<fieldset style="border:1px solid #2175bc" >
<legend>ACCI&Oacute;N DE SALIDA</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_s"><center>Id:</center>
<td>
<?php echo '<input name="id_s" type="text" id="id_s"  value="'.$_SESSION['id_s'].'" disabled="disabled" />'; ?>
      
    </td>

<tr>
<td><label for="razon_de_salida" tabindex=2>Raz&oacute;n de Salida:</label>
<td><?php echo '<input name="razon_salida" type="text" id="razon_salida" onKeyPress=" return soloLetras(event)" value="'.$_SESSION['razon_salida'].'" /> ';?>
</tr>
</table>
</form>
<a href="javascript:abrir('../reportes/ver_accionsalida.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las acciones de salida">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir"  type="submit"  value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" type="submit" form="formulario5" value="Modificar">
<input  class="vertical" name="Consultar" type="submit" value="Consultar" disabled="disabled"> 
</ul>

</div>
</div>

</div>
</body>
</html>