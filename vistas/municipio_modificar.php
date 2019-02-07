<?php
   session_start();
    if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionentrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>MUNICIPIO</title>
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
<form id="formulario7" name="formulario7" method="post" action="../controladores/municipio_modificarBD.php"  onSubmit="return validar4()">
<fieldset style="border:1px solid #2175bc" >
<legend>MUNICIPIO</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="id_m">Codigo:</label>
<td>
      
     <?php echo '<input name="id_m" type="text" id="id_m"  value="'.$_SESSION['id_m'].'" disabled="disabled" />'; ?>
      
    </td>

<tr>
<td><label for="nombre_municipio"tabindex=2>Nombre de municipio:</label>
<td>
      
      <?php echo '<input name="nombre_municipio" type="text" id="nombre_municipio" onKeyPress="return soloLetras(event)" value="'.$_SESSION['nombre_municipio'].'"/>';?>
      
    </td> </tr>

</table>
</form>
<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver los municipios" onclick = "location='../reportes/ver_municipio.php'">
</fieldset>
<ul class="center">
<input name="incluir" id="incluir" class="vertical" type="submit" value="Incluir" disabled="disabled">
<input name="modificar" id="modificar" class="vertical" type="submit" form="formulario7" value="Modificar">
<input name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" disabled="disabled">

</ul>

</div>
</div>
</div>

</body>
</html>