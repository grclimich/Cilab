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
<title>Accion de Entrada</title>
</head>
<script> 
function abrir(url) { 
open(url,'','top=0,left=0,width=420,height=280, scrollbars=1') ; 
} 
</script>

<body onLoad="document.formulario4.id_e.focus();">

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
<form id="formulario4" name="formulario4" method="post" action="../controladores/accion_entrada_modificarBD.php"  onSubmit="return validar2()">
<fieldset style="border:1px solid #2175bc" >
<legend>ACCI&Oacute;N DE ENTRADA</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_e"><center>ID:</center>
<td>
      
     <?php echo '<input name="id_e" type="text" id="id_e"  value="'.$_SESSION['id_e'].'" disabled="disabled" />'; ?>
      
    </td>

<tr>
<td><label for="razon_entrada"tabindex=2><center>Raz&oacute;n de Entrada:</center>

<td><?php echo '<input name="razon_entrada" type="text" id="razon_entrada" onKeyPress=" return soloLetras(event)" value="'.$_SESSION['razon_entrada'].'" /> ';?>

</table>
</form>
<a href="javascript:abrir('../reportes/ver_accionentrada.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las acciones de entrada">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir"  type="submit"  value="Incluir" disabled="disabled" form="formulario4">
<input  class="vertical" name="modificar" type="submit" form="formulario4" value="Modificar">
<input  class="vertical" name="Consultar" type="submit" value="Consultar" disabled="disabled">

</ul>

</div>
</div>

</div>
</body>
</html>