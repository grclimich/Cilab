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
		
			function reportePdfsalida(){			
			$html="";
			$tipo=$_SESSION['tipo2'];
			$consulta=mysql_query("SELECT sali_pro.cod_i, insumo.descripcion, presentacion.clase_presentacion, sali_pro.cantidad_salida FROM
sali_pro, insumo, presentacion WHERE insumo.cod_i = sali_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and sali_pro.cod_s like '%".$tipo."%' ORDER BY insumo.descripcion ASC ");$i=0;
			$html=$html.'<div align="center">
			<img src="../logos/banner.jpg" >
			<h2>Reporte de Salida</h2>
			<br /><br />			
			<table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#cfe6ef"><td><font color="#000000">Descripcion</font></td><td><font color="#000000">Clase Presentacion</font></td><td><font color="#000000">Cantidad Salida</font></td></tr>';
							
			while($row = mysql_fetch_array($consulta))
				{
				
					$html=$html.'<tr>';
				
				
				$html = $html.'<td>';
				$html = $html. $row["descripcion"];
				$html = $html.'</td><td>';
				$html = $html. $row["clase_presentacion"];
				$html = $html.'</td><td>';
				$html = $html. $row["cantidad_salida"];
				$html = $html.'</td></tr>';				
				$i++;
			}
			$html=$html.'</table>';	
			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>