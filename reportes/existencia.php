
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/formularioaccionentrada.css">
<title>Existencia</title>

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
		height:400px;
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
        
        <div class="datagrid" id="lista">    
<legend class="leg" style="color:#FFF">EXISTENCIA DE PRODUCTOS</legend>
<div style class="barralateral">
<table>
  <thead><tr>
    <th>Descripcion</th>
    <th>Codigo de insumo</th>
    <th>Codigo de entrada</th>
    <th>Lote</th>
    <th>Fecha de vencimiento</th>
	<th>Cantidad</th>
	</tr></thead>
	
	<?php
	 include("../BD.php");
  $obj=new conexion();
  $obj->conectar();
  
  $buscar="SELECT insumo.descripcion, existencia.cod_i, existencia.cod_e, existencia.lote, existencia.fecha_v,  existencia.n_cantidad   FROM insumo, existencia WHERE insumo.cod_i = existencia.cod_i";
$tabla=mysql_query($buscar);
  

	
	while($row=mysql_fetch_array($tabla)){
		$i=$i+1;
	$fecha[$i]=date("d-m-Y",strtotime($row["fecha_v"]));
	echo "<tbody><tr><td>".$row["descripcion"]."</td><td>".$row["cod_i"]."</td><td>".$row["cod_e"]."</td><td>".$row["lote"]."</td><td>".$fecha[$i]."</td><td>".$row["n_cantidad"]."</td></tr><tbody>";
	}

	?>

</table>
</div>
</div>
</div>
</div>
</body>
</html>
