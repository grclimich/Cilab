<?php
class login{
public $nombre_usuario;
public $pass;

function Iniciar_Sesion()
{
$strsql="SELECT * FROM usuario, perfl WHERE usuario.nombre_usuario='$this->nombre_usuario' AND usuario.pass='$this->pass' AND usuario.id_perfil=perfl.id_perfil;";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
	 

}
function contar()
{
$strsql="SELECT * FROM usuario WHERE nombre_usuario='$this->nombre_usuario' AND pass='$this->pass';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
}


}
