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
		
			function reportePdfrdm(){			
			$html="";
			$tipo=$_SESSION['tipo2'];
			$consulta=mysql_query("SELECT entrada_pro.cod_i, insumo.descripcion, presentacion.clase_presentacion, entrada_pro.cantidad_entrada FROM
entrada_pro, insumo, presentacion WHERE insumo.cod_i = entrada_pro.cod_i and insumo.presentacion= presentacion.cod_presentacion and entrada_pro.cod_e like '%".$tipo."%'");
$i=0;
			$html=$html.'<div align="center">
			<img src="../logos/banner.jpg" >
			<h2>Reporte de Entrada</h2>
			<br /><br />			
			<table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#cfe6ef"><td><font color="#000000">Descripcion</font></td><td><font color="#000000">Clase Presentacion</font></td><td><font color="#000000">Cantidad Entrada</font></td></tr>';
			
							
			while($row = mysql_fetch_array($consulta))
				{
				
					$html=$html.'<tr>';
				
				
				$html = $html.'<td>';
				$html = $html. $row["descripcion"];
				$html = $html.'</td><td>';
				$html = $html. $row["clase_presentacion"];
				$html = $html.'</td><td>';
				$html = $html. $row["cantidad_entrada"];
				$html = $html.'</td></tr>';				
				$i++;
			}
			$html=$html.'</table>';	
			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

