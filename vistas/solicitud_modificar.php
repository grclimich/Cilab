<?php
   session_start();
   if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
	}
    include("../BD.php");
	$obj=new conexion();
    $obj->conectar();
	include("../modelos/clase_solicitud.php");
	$solicitud=new solicitud();
?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioentrada.css">
<script type="text/javascript" src="../js/funciones.js"></script>

<style type="text/css">@import url("../css/calendar-blue.css");</style>
<script type="text/javascript" src="../js/calendario.js"></script>
<title>SOLICITUD</title>
</head>
<script>
function validar(formulario9){
	if(document.formulario9.nom_lab.value=="" ||document.formulario9.fecha_solicitud.value=="" || document.formulario9.status5.value=="" ){
		alert("Debe llenar todos los campos");
		return false;
	}else{
	return true;
		}
}
</script>
<body onLoad="document.formulario9.cod_soli.focus();">

<div id="container">
<div id="Cabeza">


<img src="../logos/yaracuy.png" width="106" height="104" align="left">

<img src="../logos/prosalud.png" width="106" height="104" align="right">

<font color="#FFFFFF"><center><h2>Rep&uacute;blica Bolivariana de Venezuela<br>Instituto Aut&oacute;nomo de la Salud PROSALUD Yaracuy<br>Coordinaci&oacute;n de Laboratorio</h2></center></font>

</div>
<div id="content">

<div id="column_left"></div>


<div id="column_right">


<div id="column_menu">

<?php  

include("../menu/menu.php");  

?>
</div>
    <br>
   
 
    
<form id="formulario9" name="formulario9" method="post" action="../controladores/solicitud_modificarBD.php"  onSubmit="return validar1()">
<fieldset style="border:1px solid #2175bc" >
<legend>SOLICITUD</legend>
<table width="325" height="188" align="center">
<tr>
<td><label for="nro_solicitud">Nro Solicitud:</label>
<td>
      
     <?php echo '<input name="nro_solicitud" type="text" id="nro_solicitud"  value="'.$_SESSION['nro_solicitud'].'" disabled="disabled" />'; ?>
      
    </td>
<tr>
<td><label for="cod_r">Nombre laboratorio:</label>
<td>     
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
<tr>
<td><label for="cod_i">Productos:</label>
<td>
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
    <tr>
<td><label for="cantidad">Cantidad:</label></td>
<td>
      
      <?php echo '<input name="cantidad" type="text" id="cantidad" value="'.$_SESSION['cantidad'].'" />';?>
	  
      
</td>
</tr>
<tr>
<td><label for="fecha_solicitud">Fecha de Entrada:</label>
<td>
      
      <?php echo '<input name="fecha_solicitud" type="text" id="fecha_solicitud" onKeyPress="return soloLetrasnumeros(event)" value="'.$_SESSION['fecha_solicitud'].'" />';?>
      
    </td>

<script type="text/javascript">
Calendar.setup
(
	{
inputField     :    "fecha_solicitud",     
ifFormat       :    "%d-%m-%Y",   
showsTime      :    false,        
button         :    "button",   
singleClick    :    true,          
step           :    1             
    }
);
</script>

</script>

<tr>
<td><label for="status">Status:</label>
<td>
      
      <?php echo '<input name="status" type="text" id="status" value="'.$_SESSION['status'].'" />';?>
      
    </td>

</table>
</form>
<img src="logos/visualizar.png" width="30" height="30" align="right" title="Ver Registro de Solicitud" onclick = "location='../reportes/ver_solicitud.php'">
</fieldset> 
<ul class="center">
<input  class="vertical" name="incluir" id="incluir" type="submit"  value="Incluir" form="formulario9" disabled="disabled">
<input  class="vertical" name="modificar" id="modificar" type="submit" value="Modificar" form="formulario9">
<input  class="vertical" name="consultar" id="consultar" type="submit" value="Consultar"  disabled="disabled">

</div>  
</div>
</div>
</div>
</body>
</html>