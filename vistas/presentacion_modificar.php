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
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>PRESENTACI&Oacute;N</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=420,height=280, scrollbars=1') ; 
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
<form id="formulario6" name="formulario6" method="post" action="../controladores/presentacion_modificarBD.php"  onSubmit="return validar5()">
<fieldset style="border:1px solid #2175bc" >
<legend>PRESENTACI&Oacute;N</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="cod_presentacion"><center>C&oacute;digo:</center>
<td>
      
     <?php echo '<input name="cod_presentacion" type="text" id="cod_presentacion"  value="'.$_SESSION['cod_presentacion'].'" disabled="disabled" />'; ?>
      
    </td>

<tr>
<td><label for="clase_presentacion"tabindex=2><center>Clase de Presentaci&oacute;n:</center>
<td>
      
      <?php echo '<input name="clase_presentacion" type="text" id="clase_presentacion" onKeyPress=" return soloLetras(event)" value="'.$_SESSION['clase_presentacion'].'"  />';?>
      
    </td> </tr>

</table>
</form>
<a href="javascript:abrir('../reportes/ver_presentacion.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las presentaciones">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir"  type="submit"  value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" type="submit" form="formulario6" value="Modificar">
<input  class="vertical" name="Consultar" type="submit" value="Consultar" disabled="disabled">

</ul>

</div>
</div>
</div>

</body>
</html>