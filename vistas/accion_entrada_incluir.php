<?php
   session_start();
   include("../BD.php");
   include("../modelos/clase_accion_entrada.php");
   
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
<link rel="stylesheet" type="text/css" href="../css/estilos2.css">
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/accion_entrada.js"></script>
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
<form id="formulario4" name="formulario4" method="post" action="../controladores/accion_entrada_incluirBD.php"  onSubmit="return validar2()">
<fieldset style="border:1px solid #2175bc">
<legend>ACCI&Oacute;N DE ENTRADA</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_e"><center>ID:
<td>
<?php
$obj = new conexion();
$obj->conectar();
$accion_entrada=new accion_entrada();
$accion_entrada->contar();
$consulta="SELECT id_e FROM accion_entrada";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input value=".$num." name='id_e' id='id_e' type='text' readonly='readonly'>";
 
?>
<tr>
<td><label for="razon_entrada"tabindex=2>Raz&oacute;n de Entrada:</label>
<td><input type="text" name="razon_entrada" id="razon_entrada"onkeypress="return soloLetras(event)"></td>
</tr>
</table>
</form>
<a href="javascript:abrir('../reportes/ver_accionentrada.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las acciones de entrada">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir" id="incluir"   type="submit" form="formulario4" value="Incluir">
<input  class="vertical" name="modificar" type="submit" form="formulario4" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" onclick = "location='FORMULARIO_ACCION_DE_ENTRADA.php'"/>
</ul>
</div>
</div>
</div>
</body>
</html>