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
		
			function reportePdfsolicitud(){			
			$html="";
			$tipo=$_SESSION['tipo2'];
			$consulta=mysql_query("SELECT soli_pro.cod_i, insumo.descripcion, presentacion.clase_presentacion, soli_pro.cantidad FROM
soli_pro, insumo, presentacion WHERE insumo.cod_i = soli_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and soli_pro.nro_solicitud like '%".$tipo."%' ORDER BY insumo.descripcion ASC ");
			$html=$html.'<div align="center">
			<img src="../logos/banner.jpg" >
			<h2>Reporte de Solicitud</h2>
			<br /><br />			
			<table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#cfe6ef"><td><font color="#000000">Descripcion</font></td><td><font color="#000000">Clase Presentacion</font></td><td><font color="#000000">Cantidad</font></td></tr>';
							
			while($row = mysql_fetch_array($consulta))
				{
				
					$html=$html.'<tr>';
				
				
				$html = $html.'<td>';
				$html = $html. $row["descripcion"];
				$html = $html.'</td><td>';
				$html = $html. $row["clase_presentacion"];
				$html = $html.'</td><td>';
				$html = $html. $row["cantidad"];
				$html = $html.'</td></tr>';				
				
			}
			$html=$html.'</table>';	
			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>