<?php
   session_start();
   include ("../BD.php");
   $obj=new conexion();
   $obj->conectar();
  include ("../modelos/clase_municipio.php");
  $municipio=new municipio();
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
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionentrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>PRESENTACI&Oacute;N</title>
</head>
<body onLoad="document.formulario7.id_m.focus();">

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
<form id="formulario7" name="formulario7" method="post" action="../controladores/municipio_incluirBD.php"  onSubmit="return validar4()">
<fieldset style="border:1px solid #2175bc" >
<legend>MUNICIPIO</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_m">ID:</label>
<td>
<?php
$municipio->contar();
$consulta="SELECT id_m FROM municipio";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  echo"<input value=".$num." name='id_m' id='id_m' type='text' readonly='readonly'></tr>";
?>

<tr>
<td><label for="nombre_municipio"tabindex=2>Nombre de municipio:</label>
<td><input type="text" name="nombre_municipio" id="nombre_municipio" tabindex=1 onKeyPress="return soloLetras(event)">

</table>
</form>
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver los municipios" onclick = "location='../reportes/ver_municipio.php'">
</fieldset>
<ul class="center">
<input  class="vertical" name="incluir"    type="submit" form="formulario7" value="Incluir">
<input  class="vertical" name="modificar" type="submit" form="formulario7" value="Modificar" disabled="disabled">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" onclick = "location='../vistas/FORMULARIO_MUNICIPIO.php'"/>


</ul>

</div>
</div>
</div>

</body>
</html>
