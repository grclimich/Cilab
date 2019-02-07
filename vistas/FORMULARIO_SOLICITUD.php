<?php
   session_start();
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioentrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>

<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../jscalendario.js"></script>
<title>SOLICITUD</title>
</head>
<script>
function validar(formulario9){
	if(document.formulario9.cod_soli.value==""){
		alert("Debe ingresar el numero");
		return false;
	}else{
	return true;	
		}
}
</script>
<body onLoad="document.formulario9.nro_solicitud.focus();">

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
   
 
    
<form id="formulario9" name="formulario9" method="post" action="../controladores/solicitud_consultarBD.php"  onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc" >
<legend>SOLICITUD</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="nro_solicitud">Nro Solicitud:</label>
<td><input type="text" name="nro_solicitud" id="nro_solicitud" maxlength="5" onKeyPress="return soloNumeros(event)" tabindex=1>

<tr>
<td><label for="cod_r">Laboratotio:</label>
<td><input type="text" name="cod_r" id="cod_r" maxlength="30" disabled="disabled" tabindex=1>
<tr>
<td><label for="cod_i">Productos:</label>
<td><input type="text" name="cod_i" id="cod_i"disabled="disabled" tabindex=10>
<tr>
<td><label for="fecha_solicitud">Fecha de Entrada:</label>
<td><input id="fecha_solicitud" type="text" name="fecha_solicitud" disabled="disabled" maxlength="10"tabindex=8>

<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_solicitud",     
ifFormat       :    "%d/%m/%Y",   
showsTime      :    false,        
button         :    "button",   
singleClick    :    false,          
step           :    1             
    }
);
</script>

</script>

<tr>
<td><label for="status">Status:</label>
<td><input type="text" name="status" id="status"disabled="disabled" tabindex=10>
</table>
</form>
<img src="logos/visualizar.png" width="30" height="30" align="right" title="Ver Registro de Solicitud" onclick = "location='../reportes/ver_solicitud.php'">
</fieldset> 
<ul class="center">
<input  class="vertical" name="incluir" id="incluir" type="submit"  value="Incluir" form="formulario9" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled">
<input  class="vertical" name="consultar" id="consultar" type="submit" value="Consultar" form="formulario9">

</div>  
</div>
</div>
</div>
</body>
</html>