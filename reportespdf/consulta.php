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
			$consulta=mysql_query("SELECT insumo.cod_i, insumo.descripcion, presentacion.clase_presentacion, insumo.tipo_p, insumo.almacen, insumo.observacion, insumo.n_cantidad  FROM insumo,presentacion ORDER BY descripcion ASC");$i=0;

			$html=$html.'<img src="../logos/banner.jpg" >
			<br>
			<br>
			<b><u><h2><font color="black" align="center">Reporte de Productos</font></u></b>
			<br>
			<br>
			<br>
			<table border="1" align="center">';

				
				
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
				$html = $html. $row["clase_presentacion"];
				$html = $html.'</td><td>';
				$html = $html. $row["n_cantidad"];
				$html = $html.'</td><td>';
				$html = $html. $row["tipo_p"];
				$html = $html.'</td><td>';
				$html = $html. $row["presentacion"];
				$html = $html.'</td><td>';
				$html = $html. $row["almacen"];
				$html = $html.'</td></tr>';				
				$i++;
			}
			$html=$html.'</table>';	
			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

