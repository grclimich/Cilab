<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
		#lista{ width: 770px;}/* TAMAÑO DE LA TABLA */
		
	    .datagrid legend{
		font-size:30px;
		padding:10px;
		width:100%;
		font-color:#FFF;
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #052636), color-stop(1, #85858C) );background:-moz-linear-gradient( center top, #74747A 5%, #74747A 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74747A', endColorstr='#85858C');background-color:#85858C; color:#FFFFFF; font-size: 19px; font-weight: bold; border-left: 1px solid #A3A3A3; 
			}
			
			.datagrid table {
			 border-collapse: collapse; text-align: center; width: 100%; }
		 .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 4px solid #052636; -webkit-border-radius: 12px; -moz-border-radius: 12px; border-radius: 12px; }
		 
		 .datagrid table td, .datagrid table th 
		 { padding: 11px 3px;
		 }
		 
		 .datagrid table thead th {
	     background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #85858C), color-stop(1, #052636) );background:-moz-linear-gradient( center top, #74747A 5%, #74747A 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74747A', endColorstr='#052636');background-color:#052636; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; 
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
			margin-top:10px;/* ALTURA DE LA TABLA */
	        margin-left:115px;/* ALINEAR LA TABLA */
	} 
</style>	
</head>
<body>

<div class="datagrid" id="lista">    
<legend class="leg" style="color:#ttt">PRODUCTOS</legend>
<div style class="barralateral">

<table>

<thead><tr>

    <th>Codigo de insumo</th>
    <th>Descripcion</th>
    <th>Tipo de producto</th>
    <th>Presentacion</th>
	<th>Almacen</th>
    <th>Observacion</th>
    
 </div>
	<?  
	 include("../BD.php");
  $obj=new conexion();
  $obj->conectar();
  $buscar="SELECT insumo.cod_i, insumo.descripcion, insumo.tipo_p, insumo.presentacion, insumo.almacen,  insumo.observacion   FROM insumo";
$tabla=mysql_query($buscar);
  

	
	while($row=mysql_fetch_array($tabla)){
	echo "<tbody><tr><td>".$row["cod_i"]."</td><td>".$row["descripcion"]."</td><td>".$row["tipo_p"]."</td><td>".$row["presentacion"]."</td><td>".$row["almacen"]."</td><td>".$row["observacion"]."</td></tr><tbody>";
	}

	?>
   
</table>
</div>
</div>
</body>
</html>