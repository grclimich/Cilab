<HTML>
	<HEAD>
<TITLE>CILAB</TITLE>
<link rel="stylesheet"  type="text/css" href="css/CILAB.css">
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/campovacio.js"></script>
</HEAD>

<body onLoad="document.formulario00.nombre_usuario.focus();">
<div id="container">
<div id="Cabeza">
<img src="logos/yaracuy.png" width="106" height="104" align="left" >
<img src="logos/prosalud.png" width="106" height="104" align="right">
<font color="#FFFFFF"><center><h2>Rep&uacute;blica Bolivariana de Venezuela<br>Instituto Aut&oacute;nomo de la Salud PROSALUD Yaracuy<br>Coordinaci&oacute;n de Laboratorio</h2></center></font>
</div>
<div id="content">
<div id="column_left"><br><img src="logos/logo.png" width="210" height="650" align="center"></div>
<div id="column_right">
<form id="formulario00" name="formulario00" method="post" action="loginBD.php" onSubmit="return validar6()">
<table class="tabla1">
<tr>
<td><img src="logos/Imagen1.png" width="80" height="80" align="left" ><h3>Usuario</td><td><input name="nombre_usuario" type="text" id="nombre_usuario"><td></tr></h3>
<tr><td><img src="logos/Imagen2.png" width="80" height="80" align="left" ><h3>Contraseña</td><td><input type="password" id="pass" name="pass" maxlength="10"><td></tr></h3>
<td>

<div class="center"><input name="Iniciar_Sesion" id="Iniciar_Sesion" type='submit' value='Iniciar Sesion' form="formulario00">
    
</td>
</tr>
</table>
</form>

</div>
</div>

</div>
</body>
</html>
