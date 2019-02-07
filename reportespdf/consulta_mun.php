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
		
			function reportePdflaboratorios(){			
			$html="";
			$tipo=$_SESSION['tipo2'];
			$consulta=mysql_query("SELECT cod_r, nombre_2, direccion, municipio, telefono, nro_fax, nro_rif FROM laboratorio_receptor WHERE municipio like '%".$tipo."%' ORDER BY nombre_2 ASC");$i=0;
			$html=$html.'<div align="center">
			<img src="../logos/banner.jpg" >
			<h2>Reporte de Inventario</h2>
			<br /><br />			
			<table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#cfe6ef"><td><font color="#000000">Codigo</font></td><td><font color="#000000">Nombre</font></td><td><font color="#000000">Direccion</font></td><td><font color="#000000">Municipio</font></td><td><font color="#000000">Nro. Telefono</font></td><td><font color="#000000">Nro. Fax</font></td><td><font color="#000000">Nro. Rif</font></td></tr>';
			
							
			while($row = mysql_fetch_array($consulta))
				{
				
					$html=  $html.'<tr>';
									
				$html = $html.'<td>';
				$html = $html. $row["cod_r"];
				$html = $html.'</td><td>';
				$html = $html. $row["nombre_2"];
				$html = $html.'</td><td>';
				$html = $html. $row["direccion"];
				$html = $html.'</td><td>';
				$html = $html. $row["municipio"];
				$html = $html.'</td><td>';
				$html = $html. $row["telefono"];
				$html = $html.'</td><td>';
				$html = $html. $row["nro_fax"];
				$html = $html.'</td><td>';
				$html = $html. $row["nro_rif"];
				$html = $html.'</td></tr>';				
				$i++;
			}
			$html=$html.'</table>';	
			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

