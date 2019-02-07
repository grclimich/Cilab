<?php
   session_start();
    include("BD.php");
	$obj=new conexion();
    $obj->conectar();

?><html>
<head>
<link rel="stylesheet"  type="text/css" href="css/formularioaccionsalida.css">
<script type="text/javascript" src="funciones.js"></script>
<title>Salida</title>
</head>
<script>
function validar(formulario4){
	if(document.formulario4.razon_de_entrada.value==""){
		alert("Debe llenar todos los campos");
		return false;
	}else{
	return true;	
		}
}
</script>
<body onLoad="document.formulario4.id_e.focus();">

<div id="container">
<div id="Cabeza">

<img src="logos/yaracuy.png" width="106" height="104" align="left" >

<img src="logos/prosalud.png" width="106" height="104" align="right">

<font color="#FFFFFF"><center><h2>Republica Bolivariana de Venezuela<br>Instituto Autonomo de la Salud PROSALUD Yaracuy<br>Coordinacion de Laboratorio</h2></center></font>

</div>

<div id="content">




<div id="column_left"></div>

<div id="column_right">
<div id="column_menu">
<?php  

include("menu.php");  

?>
</div>
    <br>
        <br>
<form id="formulario4" name="formulario4" method="post" action="reporte_salidaBD.php"  onSubmit="return validar()">
<fieldset style="border:1px solid #2175bc">

<legend>Reporte de Salida</legend>
<table width="300" height="170" align="center">
<tr>
<td><label for="">Nro Salida:</label></td>
<td> <input type="text" name="cod_s">
</td>
</table>
</fieldset>
<ul class="center">
<BLOCKQUOTE> <BLOCKQUOTE> <input  class="vertical" name="consultar" type="submit" form="formulario4" value="Buscar">
</ul>
</form>
</table>
</div>
</div>
</div>
</body>
</html>