<?php
   session_start();
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
	?>
 <html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionentrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<title>PRESENTACI&Oacute;N</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=420,height=280, scrollbars=1') ; 
} 
</script>


<script>
function validar(formulario6){
				var bOk = false; 
        cod_presentacion= document.getElementById("cod_presentacion").value; 
       /******************COMPRUEBA la accion_de_salida********************/
if( cod_presentacion == null || cod_presentacion.length == 0 || /^\s+$/.test(cod_presentacion) ) {
 alert('Introduzca un ID');
 document.getElementById("cod_presentacion").focus();
  return false;
}
}
</script>
<body onLoad="document.formulario6.cod_presentacion.focus();">

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
<form id="formulario6" name="formulario6" method="post"  action="../controladores/consulta_presentacion.php"  onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc" >
<legend>PRESENTACI&Oacute;N</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="cod_presentacion"><center>C&oacute;digo:</center>
<td><input type="text" name="cod_presentacion" id="cod_presentacion" maxlength="5"tabindex=1 onKeyPress="return soloNumeros(event)">

<tr>
<td><label for="clase_presentacion"tabindex=2><center>Clase de Presentaci&oacute;n:</center>
<td><input type="text" name="clase_presentacion" id="clase_presentacion" disabled="disabled" tabindex=1 onKeyPress="return soloNumeros(event)">

</table>
</form>
<a href="javascript:abrir('../reportes/ver_presentacion.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las presentaciones">
</fieldset>
<ul class="center">
<input name="incluir" id="incluir" class="vertical" type="submit" form="formulario6" value="Incluir" disabled="disabled">
<input name="modificar" id="modificar" class="vertical" type="submit" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario6">

</ul>

</div>
</div>
</div>

</body>
</html>