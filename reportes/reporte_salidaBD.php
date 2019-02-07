
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/reporte.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Salida</title>

<style type="text/css">
		#lista{ width: 500px;}/* TAMAÑO DE LA TABLA */
		
	   .datagrid legend{
		font-size:30px;
		padding:10px;
		width:100%;
		font-color:#FFF;
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #08405C), color-stop(1, #08405C) );background:-moz-linear-gradient( center top, #74747A%, #08405C 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74747A', endColorstr='#74747A');background-color:#08405C; color:#FFFFFF; font-size: 19px; font-weight: bold; border-left: 1px solid #08405C; 
			}
			
			.datagrid table {
			 border-collapse: collapse; text-align: center; width: 100%; }
		 .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 4px solid #A0A0A0; -webkit-border-radius: 12px; -moz-border-radius: 12px; border-radius: 12px; }
		 
		 .datagrid table td, .datagrid table th 
		 { padding: 11px 3px;
		 }
		 
		 .datagrid table thead th {
	     background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #08405C), color-stop(1, #08405C) );background:-moz-linear-gradient( center top, #08405C 5%, #08405C 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74747A', endColorstr='#052636');background-color:#08405C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #08405C; 
		 }
		 
		 .datagrid table thead th:first-child
		  { 
		  border: none; 
		  }
		  
		  .datagrid table tbody td 
		  {
		color: #052636; border-left: 1px solid #A0A0A0;font-size: 14px;border-bottom: 1px solid #052636;font-weight: bold; 
		}
		
		.datagrid table tbody .alt td 
		{
			 background: #EBEBEB; color: #052636;
			  }
			  
	    .datagrid table tbody td:first-child 
			  {
		border-left: none;
				    }
					
	    .datagrid table tbody tr:last-child td
		 {
	    border-bottom: none;
		 }
		 
		 	.barralateral{
		height:200px;
		width:100%;
		overflow:scroll;
		overflow-x :hidden;
		visibility:visible;
		
		
	    }
		#lista{
			margin-top:-10px;/* ALTURA DE LA TABLA */
	        margin-left:250px;/* ALINEAR LA TABLA */
	} 
</style>	
 </head>
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

<?php        
 include("../BD.php");
  $obj=new conexion();
  $obj->conectar();
  
  $busqueda=$_REQUEST['cod_s']; 
  
  $consulta=("SELECT * FROM salida_insumo WHERE cod_s='$busqueda'");
	$x= mysql_query($consulta);
	$res=mysql_fetch_array($x);
	$cod_r=$res['cod_r'];
	$fecha=date("d-m-Y",strtotime($res["fecha_s"]));
	
	$consulta2=("SELECT nombre_2 FROM laboratorio_receptor INNER JOIN salida_insumo ON laboratorio_receptor.cod_r=salida_insumo.cod_r");
	$x2=mysql_query($consulta2);
	$res2=mysql_fetch_array($x2);
	$nombre=$res2['nombre_2'];
	
	$consulta3=("SELECT municipio FROM laboratorio_receptor WHERE cod_r='$cod_r'");
	$x3=mysql_query($consulta3);
	$res3=mysql_fetch_array($x3);
	$municipio=$res3['municipio'];
	
$busqueda=("SELECT sali_pro.cod_i, insumo.descripcion, presentacion.clase_presentacion, sali_pro.cantidad_salida FROM
sali_pro, insumo, presentacion WHERE insumo.cod_i = sali_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and sali_pro.cod_s like '%".$busqueda."%' ORDER BY insumo.descripcion ASC ");
$tabla=mysql_query($busqueda);
echo"<br>";
echo"<center><h2><font color='#000'>ACTA DE ENTREGA</font></h2></center>";

echo"<h4><font color='#000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Hoy ".$fecha." se levanta la presente Acta para dejar constancia de las salidas de la Coordinacion Regional de Laboratorios
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
de el(los) Insumo(s) Reactivo(s) y/o material(es):</font></h4>";
echo"<br>";
echo"<div class='datagrid' id='lista'>";    
echo"<div style class='barralateral'>";
echo"<table>";
echo"<thead><tr>";

echo"<th>Descripcion</th>";
echo"<th>Presentacion</th>";
echo"<th>Cantidad</th>";
     
	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><td>".$row["descripcion"]."</td><td>".$row["clase_presentacion"]."</td><td>".$row["cantidad_salida"]."</td></tr><tbody>";
	}
echo" </table>";
echo"</div>";
echo"</div>";
echo"<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color='#000'>El (los) cual (cuales) seran entregado(s) al Laboratorio Clinico ".$nombre.".<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ubicado en el Municipio ".$municipio.".</font></h4>";
echo"<H4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

?>

<ul class="center5">
<a href="../reportespdf/salida_pdf.php" target="_blank"><input class="vertical" type="submit" id="imprimir" name="imprimir" value="Imprimir"/></a> 
<input class="vertical" type="submit" id="cancel" name="cancel" value="Volver" onclick="location.href='reporte_salida.php'"/>
</ul>
</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
