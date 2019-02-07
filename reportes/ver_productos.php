
<html>
<head>
<title>Productos</title>

<style type="text/css">
		#lista{ width: 700px;}/* TAMAÑO DE LA TABLA */
		
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
			margin-top:0px;/* ALTURA DE LA TABLA */
	        margin-left:0px;/* ALINEAR LA TABLA */
	} 
</style>	
    
</head>

<div id="column_right">
<div class="datagrid" id="lista">    
<legend class="leg" style="color:#FFF">PRODUCTOS</legend>
<div style class="barralateral">
<table>
  <thead><tr>
    <th>C&oacute;digo</th>
    <th>Descripci&oacute;n</th>
    <th>Presentaci&oacute;n</th>
	    <th>Tipo de producto</th>
	
	</tr></thead>
	<?php
	 include("../BD.php");
  $obj=new conexion();
  $obj->conectar();
  
  $buscar="SELECT insumo.cod_i, insumo.descripcion, insumo.tipo_p, presentacion.clase_presentacion, insumo.almacen,  insumo.observacion   FROM presentacion,insumo WHERE insumo.presentacion = presentacion.cod_presentacion ORDER BY cod_i ASC";
$tabla=mysql_query($buscar);
  

	
	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><tr><td>".$row["cod_i"]."</td><td>".$row["descripcion"]."</td><td>".$row["clase_presentacion"]."</td><td>".$row["tipo_p"]."</td></tr><tbody>";
	}

	?>

</table>
</div>
</div>
</div>
</body>
</html>
