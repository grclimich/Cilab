<?php
   session_start();
    if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
   	include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include("../modelos/clase_salida_insumo.php");
    $salida_insumo=new salida_insumo();
?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formulariosalida.css">
<script type="text/javascript" src="../js/funciones.js"></script>
<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../js/calendario.js"></script>
<title>formulario de salida</title>
</head>
<style type="text/css">
#tabla{
	border: 2px solid #A0A0A4;
	
	}
	#th{
	background:#08405C;
	color:#fff;
	margin-left:10px;
	width:170px;
	padding: 8px 8px 8px 8px;
	text-align:center;
	}
	#th1{
	background:#ffffff;
	color:#4D90FE;
	margin-left:10px;
	width:170px;
	padding: 8px 8px 8px 8px;
	text-align:center;
	}
	
	#form-1{
	margin-left:20px;
	margin-top:20px;
	width:550px;
	
	}
	
	#cod_s{
	width:60px;
	}
	#nro_solicitud{
	width:60px;
	}
	
	#cod_i{
	width:150px;
	}
	

	#cantidad_salida{
	width:60px;
	}
	#accion_de_salida{
	width:100px;
	}
	#cod_r{
	width:150px;
	}
	#fecha_s{
	width:90px;
	}
	#observaciones{
	width:90px;
	}
	

</style>
<script>
function validar(formulario2){
	if(document.formulario2.accion_de_salida.value=="" ||document.formulario2.cod_i.value=="" ||document.formulario2.cantidad_salida.value=="" ||document.formulario2.nro_salida.value==""||document.formulario2.laboratorio_r.value==""||document.formulario2.fecha_s.value==""||document.formulario2.observaciones.value==""){
		alert("Debe llenar todos los campos");
		return false;
	}else{
	return true;	
		}
}
</script>
<body onLoad="document.formulario2.cod_s.focus();">
<div id="container">
<div id="Cabeza">
<img src="../logos/yaracuy.png" width="106" height="104" align="left" >
<img src="../logos/prosalud.png" width="106" height="104" align="right">
<font color="#FFFFFF"><center><h2>Rep&uacute;blica Bolivariana de Venezuela<br>Instituto Aut&oacute;nomo de la Salud PROSALUD Yaracuy<br>Coordinaci&oacute;n de Laboratorio</h2></center></font>
</div>
<div id="content">
<div id="column_left"><img src="../logos/logo.png" width="153" height="549" align="center"></div>
<div id="column_right">
<div id="column_menu">
<?php  

include("../menu/menu.php");  

?>
</div>
    <br>
    
<form id="formulario2" name="formulario2" method="post" action="../controladores/salida_insumo_modificarBD.php"onSubmit="return validar()">
<div id="form-1">
<table id="tabla">
<tr>
    <td id="th">Codigo solicitud</th>
    <td id="th">Nro solicitud</th>
    <td id="th">Producto</th>
    <td id="th">Cantidad de salida</th>
    <td id="th">Acci&oacute;n de salida</th>
    <td id="th">lab.Receptor</th>
    <td id="th">Fecha de salida</th>
    <td id="th">Observaci&oacute;n</th>
	
	</tr>
	<tr>
<td id="th1">
      <?php echo '<input name="cod_s" type="text" id="cod_s"  value="'.$_SESSION['cod_s'].'" disabled="disabled" />'; ?>
      
    </td>
<td id="th1">
<?php
echo "<select name='nro_solicitud' id='nro_solicitud'>";
$str="SELECT nro_solicitud,nro_solicitud FROM `solicitud` ORDER BY `nro_solicitud` ASC "; 
$resp=mysql_query($str);
	echo "<option>seleccionar...</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$nro_solicitud=$data["nro_solicitud"];
			$nro_solicitud=$data["nro_solicitud"];
			echo "<option value=".$nro_solicitud.">".$nro_solicitud."</option>";
		}?>
      
</td>
<td id="th1">
<?php
$id_pres=$_SESSION['cod_i'];
$str1="SELECT descripcion FROM `insumo` WHERE `cod_i`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='cod_i' id='cod_i'>";
$str="SELECT cod_i, descripcion FROM `insumo` ORDER BY `descripcion` ASC "; 
$resp=mysql_query($str);
while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["descripcion"]."</option>";
		}
	echo "<option>-------------------</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_i=$data["cod_i"];
			$descripcion=$data["descripcion"];
			echo "<option value=".$cod_i.">".$descripcion."</option>";
		}?>
</td>
<td id="th1">
<?php echo '<input name="cantidad_salida" type="text" id="cantidad_salida" onKeyPress="return soloNumeros(event)"value="'.$_SESSION['cantidad_salida'].'" /> ';?>
</td>
<td id="th1">
<?php
$id_pres=$_SESSION['accion_de_salida'];
$str1="SELECT razon_salida FROM `accion_salida` WHERE `id_s`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='accion_de_salida' id='accion_de_salida'>";
$str="SELECT id_s,razon_salida FROM `accion_salida` ORDER BY `razon_salida` ASC "; 
$resp=mysql_query($str);
while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["razon_salida"]."</option>";
		}
	echo "<option>-------------------</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$id_s=$data["id_s"];
			$razon_salida=$data["razon_salida"];
			echo "<option value=".$id_s.">".$razon_salida."</option>";
		}?>

</td>
<td id="th1">
<?php
$id_pres=$_SESSION['cod_r'];
$str1="SELECT nombre_2 FROM `laboratorio_receptor` WHERE `cod_r`='$id_pres'"; 
$resp1=mysql_query($str1);
echo "<select name='cod_r' id='cod_r'>";
$str="SELECT cod_r, nombre_2 FROM `laboratorio_receptor` ORDER BY `nombre_2` ASC "; 
$resp=mysql_query($str);
while ($data1=mysql_fetch_array($resp1))
		{
		echo "<option value=".$id_pres.">".$data1["nombre_2"]."</option>";
		}
	echo "<option>-------------------</option>";
	    while ($data=mysql_fetch_array($resp))
		{
			$cod_r=$data["cod_r"];
			$nombre_2=$data["nombre_2"];
			echo "<option value=".$cod_r.">".$nombre_2."</option>";
		}?>
</td>
<td id="th1">
<?php echo '<input name="fecha_s" readonly="readonly" type="text" id="fecha_s"onKeyPress=" return soloLetrasnumeros(event)" value="'.$_SESSION['fecha_s'].'" /> ';?>
<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_s",     
ifFormat       :    "%d-%m-%Y",   
showsTime      :    false,        
button         :    "button",   
singleClick    :    false,          
step           :    1             
    }
);
</script>
</td>

<td id="th1">
<?php echo '<input name="observaciones" type="text" id="observaciones" onKeyPress=" return soloLetras(event)" value="'.$_SESSION['observaciones'].'" /> ';?>
</td>
</tr>
</table>
</div>
</form>

<img src="../logos/visualizar.png" width="30" height="30" align="right" title="Ver Productos" onclick = "location='../reportes/ver_salida.php'"> 

<ul class="center">
<input  class="vertical" name="incluir" id="incluir"  type="submit" form="formulario2" value="Incluir" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" form="formulario2"  value="Modificar" >
<input  name="consultar" id="consultar" class="vertical" type="submit" value="Consultar" form="formulario2" disabled="disabled">
</ul>
</div>
</div>
</div>
</body>
</html>