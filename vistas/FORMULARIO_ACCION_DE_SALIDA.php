
 <html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionsalida.css">
<script type="text/javascript" src="../js/funciones.js"></script>
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
        id_s= document.getElementById("id_s").value; 
       /******************COMPRUEBA la accion_de_salida********************/
if( id_s == null || id_s.length == 0 || /^\s+$/.test(id_s) ) {
 alert('Introduzca un ID');
 document.getElementById("id_s").focus();
  return false;
}
}
</script>
<body onLoad="document.formulario5.id_s.focus();">

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
<form id="formulario5" name="formulario5" method="post" action="../controladores/accion_salida_consultarBD.php"onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc" >
<legend>ACCI&Oacute;N DE SALIDA</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_s"><center>Id:</center>
<td><input type="text" name="id_s" id="id_s" maxlength="5" tabindex=1 onKeyPress="return soloNumeros(event)">

<tr>
<td><label for="razon_salida" tabindex=2><center>Raz&oacute;n de Salida:</center>

<td><input type="text" name="razon_salida" id="razon_salida"disabled="disabled"></td>

</table>
</form>
<a href="javascript:abrir('../reportes/ver_accionsalida.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las acciones de salida">
</fieldset>

<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" value="Incluir" disabled="disabled" >
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" disabled="disabled" >
<input  class="vertical" name="consultar" id="consultar"  type="submit" form="formulario5"value="Consultar"> 
</ul>

</div>
</div>

</div>
</body>
</html>
