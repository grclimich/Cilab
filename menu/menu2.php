<?php 
 
    session_start();
	if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
    }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/menu2.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>menu</title>

<style type="text/css">
h1{
font-size:25px;
color:#A00;
	margin-top:20px;
	margin-left:0px;
	}
	
</style>

</head>
<body>
<div id="container">
<div id="Cabeza">
<img src="../logos/yaracuy.png" width="106" height="104" align="left">
<img src="../logos/prosalud.png" width="106" height="104" align="right">
<font color="#FFFFFF"><center><h2>Rep&uacute;blica Bolivariana de Venezuela<br>Instituto Aut&oacute;nomo de la Salud PROSALUD Yaracuy<br>Coordinaci&oacute;n de Laboratorio</h2></center></font>
</div>
<div id="content">
<div id="column_left"><br><img src="../logos/logo.png" width="210" height="650" align="center"></div>
<div id="column_right">
<ul class="nav">
        	  
			  <div><?php echo  '<h1><img src="../logos/adm.png">'.$_SESSION['nombre_perfil'].': '.$_SESSION['nombre_usuario'].'</h1>'?></div>    
            
<li><a href=""><center>Transacciones</center></a>
    <ul>
    <li><a href="../vistas/entrada_insumo_incluir.php"><center>Productos de entrada</center></a>
	<li><a href=""><center>Productos<br>de salida</center></a>
	<ul>
	<li><a href="../vistas/salida_insumo_incluir.php"><center>Salida por solicitud</center></a>
	<li><a href="../vistas/salida_caussasnaturales.php"><center>Salida por causas naturales</center></a></li>
	</ul>
    <li><a href="../vistas/controlador_solicitud.php"><center>Solicitud</center></a>

                </ul>
            </li>                         

   <li><a href=""><center>Ingresar</center></a>
    <ul>
	<li><a href="../vistas/insumo_incluir.php"><center>Productos</center></a>
	<li><a href="../vistas/laboratorio_incluir.php"><center>Laboratorios Receptores</center></a>
	</li>
   	</ul>			
     
<li><a href=""><center>Reportes</center></a>
    <ul>
    <li><a href="../reportes/reporte_inventario.php"><center>Inventario de Productos</center></a></li>
    <li><a href="../reportes/existencia.php"><center>Existencia<br>de Productos</center></a>
    <li><a href="../reportes/reporte_rdm.php"><center>Entrada<br>de Productos</center></a>
    <li><a href="../reportes/reporte_salida.php"><center>Salida<br>de Productos</center></a>
    <li><a href="../reportes/reporte_solicitud.php"><center>Solicitud<br>de Productos</center></a>
	<li><a href="../reportes/reporte_laboratorio.php"><center>Laboratorios<br>Receptores</center></a>
    <li><a href="../reportes/reporte_fecha_v.php"><center>Productos<br>por fecha de vencimiento</center></a></ul></li> 			

	
    <li><a href=""><center>Configuraci&oacute;n</center></a>
    <ul>
    
	<li><a href="../vistas/accion_entrada_incluir.php"><center>Acci&oacute;n de Entrada</center></a>
    <li><a href="../vistas/accion_salida_incluir.php"><center>Acci&oacute;n de Salida</center></a>
    <li><a href="../vistas/presentacion_incluir.php"><center>Presentaci&oacute;n</center></a>
	<li><a href="../usuario/usuarios_buscar.php"><center>Registro de Usuario</center></a>
    
   
	</li>
   	</ul>   	
        <li><a href="../logout.php"><center>Salir</center></a></li>   
                                   
    </ul>
	
	<br>
	<br>


</div>
</div>
</div>
</body>
</html>
