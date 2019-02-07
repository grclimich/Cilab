<?php 
session_start();
?>
<?php
require "../BD.php";

		class consulta{
			
			function consulta()
			{		
		$conexion= new conexion();			$conexion-> conectar();	
			}		
		
			function reportePdfProductos(){			
			$html="";
			$consulta=mysql_query("SELECT insumo.cod_i, insumo.descripcion, presentacion.clase_presentacion, insumo.tipo_p, insumo.almacen, insumo.observacion, insumo.n_cantidad  FROM insumo,presentacion  WHERE insumo.presentacion= presentacion.cod_presentacion ORDER BY tipo_p, descripcion ASC");$i=0;

			$html=$html.'<div align="center">
			<img src="../logos/banner.jpg" >
			<h2>Reporte de Inventario</h2>
			<br /><br />			
			<table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#cfe6ef"><td><font color="#000000">Codigo</font></td><td><font color="#000000">Descripcion</font></td><td><font color="#000000">Cantidad</font></td><td><font color="#000000">Presentacion</font></td><td><font color="#000000">Tipo de Producto</font></td><td><font color="#000000">Almacen</font></td></tr>';
			
							
			while($row = mysql_fetch_array($consulta))
				{
				if($i==0)
					{
					$html=  $html.'<tr>';
					}
					else{
					$html=$html.'<tr>';
					    }
				
				$html = $html.'<td>';
				$html = $html. $row["cod_i"];
				$html = $html.'</td><td>';
				$html = $html. utf8_encode($row["descripcion"]);
				$html = $html.'</td><td>';
				$html = $html. $row["n_cantidad"];
				$html = $html.'</td><td>';
				$html = $html. utf8_encode($row["tipo_p"]);
				$html = $html.'</td><td>';
				$html = $html. $row["clase_presentacion"];
				$html = $html.'</td><td>';
				$html = $html. utf8_encode($row["almacen"]);
				$html = $html.'</td></tr>';				
				$i++;
			}
			$html=$html.'</table>';	
			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

