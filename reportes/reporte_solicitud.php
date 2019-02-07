<?php
   session_start();
 
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}

    include("../BD.php");
	$obj=new conexion();
    $obj->conectar();

?><html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionsalida.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/campovacio.js"></script>
<title>Solicitud</title>
</head>

<body onLoad="document.formulario17.id_e.focus();">

<div id="container">
<div id="Cabeza">

<img src="../logos/yaracuy.png" width="106" height="104" align="left" >

<img src="../logos/prosalud.png" width="106" height="104" align="right">

<font color="#FFFFFF"><center><h2>Republica Bolivariana de Venezuela<br>Instituto Autonomo de la Salud PROSALUD Yaracuy<br>Coordinacion de Laboratorio</h2></center></font>

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
<form id="formulario17" name="formulario17" method="post" action="reporte_solicitudBD.php"  onSubmit="return validar18()">
<fieldset style="border:1px solid #2175bc">

<legend>Reporte de Solicitud</legend>
<table width="300" height="170" align="center">
<tr>
<td><label for="">Nro Solicitud:</label></td>
<td> <input type="text" id="nro_solicitud" name="nro_solicitud">
</td>
</table>
</fieldset>
</form>
</table>
<ul class="center2">
<input  class="vertical" name="consultar" type="submit" form="formulario17" onKeyPress="return soloNumeros(event)" maxlength="5" value="Buscar">
</ul>
<br>
<ul class="center5">
<input  class="vertical2" name="Buscar" type="submit" value="TODAS LAS SOLICITUDES" onclick = "location='ver_solicitud.php'">
</ul>
</div>
</div>
</div>
</body>
</html>