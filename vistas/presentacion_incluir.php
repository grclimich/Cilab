<?php
   session_start();
   include("../BD.php");
   include("../modelos/clase_presentacion.php");
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
<script src="../js/presentacion.js"></script>
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
<form id="formulario6" name="formulario6" method="post" action="../controladores/presentacion_incluirBD.php"  onSubmit="return validar5()">
<fieldset style="border:1px solid #2175bc" >
<legend>PRESENTACI&Oacute;N</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="cod_presentacion"><center>C&oacute;digo:</center>
<td>
<?php
$obj = new conexion();
$obj->conectar();
$presentacion=new presentacion();
$presentacion->contar();
$consulta="SELECT cod_presentacion,clase_presentacion FROM presentacion";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input value=".$num." name='cod_presentacion' id='cod_presentacion' type='text' readonly='readonly'></tr>";
?>
</td>
<tr>
<td><label for="clase_presentacion"tabindex=2><center>Clase de Presentaci&oacute;n:</center>
<td><input type="text" name="clase_presentacion" id="clase_presentacion" tabindex=1 onKeyPress="return soloLetras(event)">

</table>
</form>
<a href="javascript:abrir('../reportes/ver_presentacion.php')">
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver las presentaciones">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir"  id="incluir"  type="submit" form="formulario6" value="Incluir">
<input  class="vertical" name="modificar" type="submit" form="formulario6" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" onclick = "location='formulario_presentacion.php'"/>

</ul>

</div>
</div>
</div>

</body>
</html>