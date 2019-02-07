
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionentrada.css">
<title>Solicitud</title>

<style type="text/css">
		#lista{ width: 770px;}/* TAMAÑO DE LA TABLA */
		
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
		height:300px;
		width:100%;
		overflow:scroll;
		overflow-x :hidden;
		visibility:visible;
		
		
	    }
		#lista{
			margin-top:10px;/* ALTURA DE LA TABLA */
	        margin-left:115px;/* ALINEAR LA TABLA */
	} 
</style>	
    
</head>
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
	
<?php        
 include("../BD.php");
  $obj=new conexion();
  $obj->conectar();
  
  $busqueda=$_REQUEST['nro_solicitud']; 
  
  $consulta=("SELECT * FROM solicitud WHERE nro_solicitud='$busqueda'");
	$x= mysql_query($consulta);
	$res=mysql_fetch_array($x);
	$cod_r=$res['cod_r'];
	$fecha=date("d-m-Y",strtotime($res["fecha_solicitud"]));
	
	$consulta2=("SELECT nombre_2 FROM laboratorio_receptor INNER JOIN solicitud ON laboratorio_receptor.cod_r=solicitud.cod_r");
	$x2=mysql_query($consulta2);
	$res2=mysql_fetch_array($x2);
	$nombre=$res2['nombre_2'];
	
$busqueda=("SELECT soli_pro.cod_i, insumo.descripcion, presentacion.clase_presentacion, soli_pro.cantidad FROM
soli_pro, insumo, presentacion WHERE insumo.cod_i = soli_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and soli_pro.nro_solicitud like '%".$busqueda."%' ORDER BY insumo.descripcion ASC ");
$tabla=mysql_query($busqueda);

echo"<div class='datagrid' id='lista'>"; 
echo"<legend class='leg' style='color:#FFF'>INVENTARIO DE SOLICITUDES</legend>";    
echo"<div style class='barralateral'>";
echo"<table>";
echo"<thead><tr>";
echo"<th>Descripcion</th>";
echo"<th>Presentacion</th>";
echo"<th>Cantidad</th>";
     
	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><td>".$row["descripcion"]."</td><td>".$row["clase_presentacion"]."</td><td>".$row["cantidad"]."</td></tr><tbody>";
	}
 echo" </table>";

?>

</table>
</div>
</div>
<br>
<ul class="center5">
<a href="../reportespdf/solicitud_pdf.php" target="_blank"><input class="vertical" type="submit" id="imprimir" name="imprimir" value="Imprimir"/></a>
<input class="vertical" type="submit" id="cancel" name="cancel" value="Volver" onclick="location.href='reporte_solicitud.php'"/>
</ul>
</div>
</div>
</body>
</html>
